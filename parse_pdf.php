#!/usr/bin/php
<?php
function afla_categoria($beneficiar) {
	$categorii = array(
		'retragere' => array(),
		'comision' => array(''),
		'factura' => array('ENEL ENERGIE MUNTENIA SA'),
		'supermarket' => array('CARREFOUR ROMANIA SA RO BUCURESTI'),
		'haine' => array('DEICHMANN S.R.L. RO Bucuresti Rom', 'PEEK AND CLOPPENBURG SRL RO BUCURESTI'),
		'restaurant' => array('MCDONALDS ROMANIA SRL RO BUCURESTI'),
		'transport' => array('BILETEONLINE.CFRCALATORI RO BUCURESTI'),
		'farmacie' => array('SENSIBLU SRL RO BUCURESTI'),
		'distractie' => array('DIVERTA BANEASA SHOP RO BUCURESTI'),
		'medicina' => array(),
		'casa' => array('IKEA ROMANIA SRL RO BUCURESTI'),
		'altele' => array(),
		'investitii' => array(),
		'cazare' => array(),
		'impozit' => array('WWW.APPS.GHISEUL.RO RO BUCURESTI'),
		'auto' => array()
		);
	foreach ($categorii as $k => $v) {
		if (in_array($beneficiar, $v)) {
			return $k;
		}
	}
	return $beneficiar;
}

function este_categorie_ignorata($categorie) {
	return in_array($categorie, ['altele', 'investitii', 'retragere']);
}

function adauga_cheltuiala($categorie, $timp, $suma) {
	global $data;
	if (!este_categorie_ignorata($categorie)) {
		if (!array_key_exists($categorie, $data)) {
			$data[$categorie] = array();
		}
		if (!array_key_exists($timp, $data[$categorie])) {
			$data[$categorie][$timp] = array(0, 0);
		}
		$data[$categorie][$timp][0] += $suma;
		$data[$categorie][$timp][1]++;
	}
}

function parseaza_extrasele($fisier) {
	global $luni, $perioada;
	$text = preg_replace('/Detalii:(?!corectie trz dublata).+\n.+\n/i', '', file_get_contents($fisier));
	$suma = array();
	$beneficiar = array();
	$tip = array();
	$timp = array();
	foreach (preg_split('/\n/', $text) as $line) {
		while ($line != '') {
			if (preg_match('/\d\d? ((?:' . implode('|', $luni) . ') \d\d\d\d)\s*/i', $line, $matches)) {
				$timp[] = $matches[1];
			} else if (preg_match('/Terminal:(.+)/', $line, $matches)) {
				$beneficiar[] = trim($matches[1]);
			} else if (preg_match('/Beneficiar:(.+)/', $line, $matches)) {
				$beneficiar[] = trim($matches[1]);
			} else if (preg_match('/Ordonator:(.+)/', $line, $matches)) {
				$beneficiar[] = trim($matches[1]);
			} else if (preg_match('/Retragere numerar\s?/', $line, $matches)) {
				$tip[] = 'retragere';
			} else if (preg_match('/Comision pe operatiune\s?/', $line, $matches)) {
				$tip[] = 'comision';
				$beneficiar[] = '';
			} else if (preg_match('/Plata debit direct\s?/', $line, $matches)) {
				$tip[] = 'direct debit';
			} else if (preg_match('/Cumparare POS (corectie|- stornare)\s?/', $line, $matches)) {
				$tip[] = 'incasare';
			} else if (preg_match('/Cumparare POS\s?/', $line, $matches)) {
				$tip[] = 'pos';
			} else if (preg_match('/Transfer\s?(Multimat|Home\'Bank)?\s?/', $line, $matches)) {
				$tip[] = 'transfer';
			} else if (preg_match('/Incasare\s?/', $line, $matches)) {
				$tip[] = 'incasare';
			} else if (preg_match('/Depunere numerar\s?/', $line, $matches)) {
				$tip[] = 'incasare';
			} else if (preg_match('/Taxe si comisioane\s?/', $line, $matches)) {
				$tip[] = 'comision';
				$beneficiar[] = '';
			} else if (preg_match('/^(\d+\.?\d*,\d\d)$/', $line, $matches)) {
				$suma[] = floatval(str_replace(',', '.', str_replace('.', '', $matches[0])));
			} else if (preg_match('/Detalii:corectie trz dublata.+/', $line, $matches)) {
				$beneficiar[] = '';
			} else {
				break;
			}
			$line = str_replace($matches[0], '', $line);
		}
	}
	$c = count($suma);
	$cb =  count($beneficiar);
	$ct = count($timp);
	$cp = count($tip);
	if ($c !=$cb || $c != $ct || $c != $cp) {
		fwrite(STDERR, "Sirurile sunt desincronizate [$c|$cb|$ct|$cp].");
	}
	array_walk($suma, function($s, $i) use ($beneficiar, $timp, $tip) {
		adauga_cheltuiala(afla_categoria($beneficiar[$i]), $timp[$i], $tip[$i] == 'incasare' ? -$s : $s);
	});
	$perioada = array_unique($timp);
}

function parseaza_numerar($fisier) {
	global $data;
	if (($handle = fopen($fisier, "r")) !== FALSE) {
		while (($line = fgetcsv($handle, 0, ",")) !== FALSE) {
			adauga_cheltuiala($line[1], $line[0], floatval($line[2]));
		}
		fclose($handle);
	}
}

function extrage_an($timp) {
	return substr($timp, -4);
}

function construieste_perioada($luna, $an) {
	return "$luna $an";
}

function totaluri_pe_categorii($index, $an) {
	global $data;
	return array_map(function($categorie) use ($index, $an) {
		return array_sum(array_column(array_filter($categorie,
										function($timp) use ($an) { return extrage_an($timp) == $an; },
										ARRAY_FILTER_USE_KEY),
									$index)
						);
	}, $data);
}

function cheltuieli_pe_an($index, $unitate, $titlu, $cdiv) {
	global $luni, $perioada, $data;
	$ani = array_unique(array_map(function($elem) { return extrage_an($elem); }, $perioada));
	?>
	AmCharts.makeChart("<?=$cdiv?>", {
			"type": "serial",
			"categoryField": "category",
			"categoryAxis": { "gridPosition": "start" },
			"trendLines": [],
			"graphs": [
			<?php
				$numani = count($ani);
				foreach ($ani as $v) {
					$numani--; ?>
				{
					"id": "<?=$v?>",
					"title": "<?=$v?> (<?=array_sum(totaluri_pe_categorii($index, $v))?> lei)",
					"valueField": "valoare<?=$v?>",
					//"fillAlphas": 0.7,
					//"lineAlpha": 0,
					"type": "smoothedLine",
					"bullet": "round",
					"balloonText": "<?=$v?>: [[value]] lei"
				<?php if ($numani == 0) { echo ',"lineThickness": 4'; } ?>
				},
			<?php } ?>
			],
			"guides": [],
			"valueAxes": [{ "id": "ValueAxis-1",
					//"stackType": "regular",
					"title": "<?=$unitate?>" }],
			"allLabels": [],
			"balloon": {},
			"legend": { "enabled": true,
				//"markerType": "circle"
				useGraphSettings: true
			},
			"startDuration": 0,
			"titles": [{ "id": "Title-1", "size": 15, "text": "<?=$titlu?>" }],
			"dataProvider": [
			<?php
				$numitems = count($luni);
				foreach ($luni as $l) {
					$numitems--;
					echo "{ \"category\": \"$l\",";
					$numani = count($ani);
					foreach ($ani as $a) {
						$numani--;
						$total = array_sum(array_column(array_column($data, construieste_perioada($l, $a)), $index));
						echo '"valoare' . $a . '":"' . ($total > 0 ? $total : 'NULL') . '"';
						if ($numani > 0) {
							echo ',';
						}
					} echo '}';
					if ($numitems > 0) {
						echo ',';
					}
				} ?>
			]
		}
	);
<?php }

function cheltuieli_toate_perioadele($index, $unitate, $titlu, $cdiv, $bubble) {
	global $perioada, $data; ?>
	AmCharts.makeChart("<?=$cdiv?>", {
			"type": "serial",
			//"rotate": true,
			"categoryField": "category",
			"categoryAxis": { "gridPosition": "start" },
			"chartScrollbar": { "enabled": true },
			"trendLines": [],
			"graphs": [
			<?php $numitems = count($perioada); foreach ($perioada as $v) { $numitems--; ?>
				{
					"id": "<?=$v?>",
					"title": "<?=$v?>",
					"valueField": "<?=$v?>",
					"type": "column",
					"fillAlphas": 1,
					"balloonText": "<?=$v?>: [[value]] <?=$bubble?>"
				}
			<?php if ($numitems > 0) { echo ','; }} ?>
			],
			"guides": [],
			"valueAxes": [{
					"id": "ValueAxis-1",
					"title": "<?=$unitate?>"
					//"stackType": "regular"
				}
			],
			"allLabels": [],
			"balloon": {},
			"legend": { "enabled": true,
				//"markerType": "circle"
				useGraphSettings: true
			},
			"startDuration": 0,
			"titles": [{ "id": "Title-1", "size": 15, "text": "<?=$titlu?>" }],
			"dataProvider": [
			<?php $numitems = count($data);
			foreach ($data as $i => $v) {
				$numitems--;
				echo "{ \"category\": \"$i\",";
				foreach ($perioada as $k) { ?>
				"<?=$k?>": "<?=array_key_exists($k, $v) ? $v[$k][$index] : 0?>",
			<?php } echo '}'; if ($numitems > 0) { echo ',';}} ?>
			]
		}
	);
<?php }

function total_pe_luna($index, $timp) {
	global $data;
	return array_sum(array_column(array_column($data, $timp), $index));
}

function cheltuieli_pe_luna($index, $unitate, $timp, $cdiv) {
	global $perioada, $data; ?>
	AmCharts.makeChart("<?=$cdiv?>", {
			"type": "pie",
			//"groupedPulled": false,
			//"groupPercent": 1,
			//"groupedTitle": "Altele",
			"startDuration": 0,
			"titleField": "category",
			"valueField": "column-1",
			"allLabels": [],
			"balloon": {},
			"legend": { "enabled": true, "markerType": "circle" },
			"titles": [{ "id": "Title-1", "size": 15, "text": "<?=$timp?>: <?=total_pe_luna($index, $timp)?> <?=$unitate?>" }],
			"dataProvider": [
			<?php
			$numitems = count($data);
			foreach ($data as $k => $v) {
				$numitems--;
				if (array_key_exists($timp, $v) && $v[$timp][$index] > 0) { ?>
				{
					"category": "<?=$k?>", "column-1": <?=$v[$timp][$index]?>
				}
			<?php if ($numitems > 0) { echo ','; }}} ?>
			]
		}
	);
<?php }

function id_div($luna) {
	return "chartdiv $luna";
}

$data = array();
$perioada = array();
$luni = array('ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie', 'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie');
parseaza_extrasele('extras.txt');
parseaza_numerar('numerar.txt');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cheltuieli</title>
		<script src="amcharts/amcharts.js"></script>
		<script src="amcharts/serial.js"></script>
		<script src="amcharts/pie.js"></script>
		<script>
			<?php
			cheltuieli_pe_an(0, 'Lei', 'Cheltuieli', 'chartdiv1');
			cheltuieli_toate_perioadele(0, 'Lei', 'Cheltuieli', 'chartdiv2', 'lei');
			cheltuieli_toate_perioadele(1, 'Numar', 'Numar de plati', 'chartdiv3', '');
			foreach ($perioada as $i) {
				cheltuieli_pe_luna(0, 'Lei', $i, id_div($i));
			} ?>
		</script>
	</head>
	<body>
		<div id="chartdiv1" style="width: 100%; height: 600px;"></div>
		<div id="chartdiv2" style="width: 100%; height: 600px;"></div>
		<div id="chartdiv3" style="width: 100%; height: 600px;"></div>
		<?php foreach (array_reverse($perioada) as $i) { ?>
		<div id="<?=id_div($i)?>" style="float:left; width: 600px; height: 600px;"></div>
		<?php } ?>
	</body>
</html>
