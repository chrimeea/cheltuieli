#!/usr/bin/php
<?php
function afla_categoria($beneficiar) {
	$categorii = array(
		'retragere' => array('5029 OBOR BRANCH RO BUCURESTI', '5502 OFFICE ST. CEL MARE RO BUCURESTI',
			'5553 ING OFFICE COLENT RO BUCURESTI'),
		'comision' => array(''),
		'factura' => array('ENEL ENERGIE MUNTENIA SA', 'S.C. GDF SUEZ Energy Romania S.A.',
			'GDF SUEZ ENERGY ROMANIA SA', 'RCS&RDS T. DOAMNEI DEP RO Bucuresti', 'RCS & RDS RO BUCURESTI',
			'ENGIE ROMANIA S.A.', 'Vodafone Romania SA', 'S.C ENEL Energie Muntenia S.A.',
			'ENGIE Romania S.A.', 'ENGIE ROMANIA S.A..', 'RCS AND RDS SA RO BUCURESTI',
			'ENEL ENERGIE MUNTENIA RO BUCURESTI'),
		'supermarket' => array('KAUFLAND 1000 COLENTINA RO BUCURESTI', 'LIDL 136 BUCURESTI RO BUCURESTI',
			'CARREFOUR ROMANIA SA RO BUCURESTI', '0142 MI COLENTINA 2 RO BUCURESTI', '0001 MI LIZEANU RO BUCURESTI',
			'TIP TOP COLENTINA DEP RO BUCURESTI', '0436 OBOR 2 RO BUCURESTI', '0436 MEGAIMAGE OBOR 2 RO BUCURESTI',
			'0142 MEGAIMAGE COLENTINA2 RO BUCURESTI', 'BILLA ROMANIA SRL RO SINAIA',
			'SUPERMARKET GRAND DEP RO CONSTANTA', 'CORA SUN PLAZA A RO BUCURESTI',
			'0047 MEGAIMAGE OBOR RO BUCURESTI', 'MRC BUC.- COLENTINA 2 RO BUC.',
			'0001 MEGAIMAGE LIZEANU RO BUCURESTI', 'MEGAIMAGE 0142 COLENTINA2 RO BUCURESTI',
			'MEGAIMAGE 0436 OBOR 2 RO BUCURESTI', 'MOL BUCURESTI RAMNICU RO BUCURESTI',
			'LD AEROPORT BXL NATIO BE ZAVENTEM', 'REGALINA NATURAL SRL RO BRAN',
			'NONSTOP NANSY BRAN RO BRAN', 'PENNY BUSTENI 4459 C2 RO BUSTENI',
			'PENNY BUSTENI 4459 C4 RO BUSTENI', 'PENNY COLENTI.4541 C2 RO BUCURESTI',
			'CARREFOUR ROMANIA RO BUCURESTI', 'MEGAIMAGE 0004 TITULESCU RO BUCURESTI',
			'COLUMBUS OPERATIONAL SRL RO CONSTANTA', 'NYX*SCHYPERVENDINGSRL RO Bucharest',
			'MEGAIMAGE 0047 OBOR RO BUCURESTI', 'ALEXANDRU CAM SERV SRL RO MUNICIPIUL BU',
			'PLANT FESTIN OBOR C2 RO BUCURESTI', 'PLANT FESTIN OBOR C3 RO BUCURESTI',
			'RC073 ROMPETROL VALC RO VALCELE', 'PROFI MAG 2139 BRAIL RO BRAILA',
			'MKN DUAL MODERN RO Constanta', 'OMV 1886/ RO LEHLIU GARA',
			'SHOP&GO 0503 TEIUL D RO BUCURESTI', 'SELGROS - 157 ID02 RO BRAILA',
			'COLUMBUS OPERATIONAL SRL RO SINAIA', 'MEGAIMAGE 0901 Lizeanu 2 RO Bucuresti',
			'OMV 1253/ RO Fetesti'),
		'haine' => array('STEF JIV PROD IMPEX SRL RO BUCURESTI', 'CARACTERO STIL SRL',
			'07628 STRADIVARIUS UNI RO MUNICIPIUL BU', 'ROVAS TRANS OBOR RO BUCURESTI',
			'SARACARM INTIMA RO BUCURESTI', 'MOBILPAY*MADAME RO MUNICIPIUL BU',
			'CARACTERO STIL SRL RO BUCURESTI', 'SOFIMAR LENJERIE RO BUCURESTI',
			'CAMAIEU MODA ROMANIA SRL RO BUCURESTI', 'LILIANA TRADE OBOR RO BUCURESTI',
			'AGNES TOMA DEP RO BUCURESTI', 'SYLPET OBOR ORTOPEDI RO BUCURESTI',
			'MICHELLE OBOR DEP RO BUCURESTI', 'TINA MODERN STYLE - RO BUCURESTI',
			'ANGELA COM DEP RO BUCURESTI', 'MELI MELO ORDIHEEA RO BUCURESTI',
			'MELI M FEERIA PL RO BUCURESTI', 'MELI MELO FASHION RO BUCURESTI',
			'STRADIVARIUS BSC C1 RO BUCURESTI', 'C & A Moda 461 RO sat Varsatura',
			'GENCO TRADE SRL RO BUCURESTI S1', 'LC WAIKIKI VERANDA RO MUNICIPIUL BU',
			'C & A Moda 436 RO Bucharest', 'MELI MELO SUNPLAZA RO BUCURESTI',
			'C & A Moda 416 RO Bucuresti', 'Deichmann Bucuresti 084 RO Bucuresti',
			'CARACTERO STIL SRL RO SECTOR 1', 'BON PRIX SPOLKA Z.O.O',
			'RMS CONTAINER RO BUCURESTI', 'BOYS AND GIRLS FASHION SR RO BUCURESTI',
			'BERSHKA BSC C3 RO BUCURESTI', 'SHOEBOX BANEASA RO BUCURESTI',
			'H&M RO0005 UNIREA C11 RO BUCURESTI', 'WWW.BONPRIX.RO PL LODZ',
			'H&M RO0005 UNIREA C1 RO BUCURESTI', 'SYSMEROM COM SRL 4 RO BUCURESTI',
			'H&M RO0048 VERANDA C5 RO BUCURESTI', 'H&M RO0048 VERANDA C6 RO BUCURESTI',
			'CCC VERANDA OBOR RO BUCURESTI', 'SOTEX ONLINE SRL RO BUCURESTI',
			'SC LV COM 2002 SRL RO BUCURESTI', 'LIBRAPAY RO BUCURESTI', 'ORSAY.COM/RO RO Bucuresti',
			'MA DAME STIL SRL IN FALIMENT', 'NEXTDIRECTORY RON GB INTERNET',
			'H&M RO0048 VERANDA C4 RO BUCURESTI', 'CASA ROMA MOB RO BUCURESTI',
			'HM.COM RO 0800897777', 'c-and-a.com/eu/en/shop DE Duesseldorf', 'ROUMASPORT SRL RO BUCURESTI'),
		'cosmetice' =>  array('SEPHORA MARINOPOULOS ROMA RO BUCURESTI', 'GINKGO ROMANIA RO BUCURESTI',
			'YR UNIREA SHOPPING C RO BUCURESTI', 'OLIDA COM-IMPEX SRL RO BUCURESTI',
			'COSMETIQUES DE FRANCE RO BUCURESTI', 'YR SUN PLAZA RO BUCURESTI',
			'YVES ROCHER ORHIDEEA RO BUCURESTI', 'YR BANEASA SHOPPING RO BUCURESTI',
			'YVES ROCHER VERANDA RO BUCURESTI', 'THE BODY SHOP BANEAS RO BUCURESTI',
			'SEPHORA COSMETICS ROMANIA RO BUCURESTI', 'MI&TA NO.1 IMPEX SRL RO BUCURESTI',
			'YVES ROCHER BANEASA RO BUCURESTI', 'MOBILPAY*ALMANATURAL RO MUNICIPIUL BU',
			'YVES ROCHER CARREFOU RO BUCURE', 'DM FIL 63 C2 RO BUCURESTI',
			'YVES ROCHER VERANDA RO BUCURE', 'DM FILIALA 109 RO BUCURESTI',
			'THE BODY SHOP MALL RO BUCURESTI', 'YVES ROCHER CARREFOU RO BUCURESTI',
			'WWW.THEBODYSHOP.RO RO BUCURESTI', 'yves-rocher.ro RO Bucure*ti', 'DM FILIALA 063 RO BUCURESTI',
			'MOBILPAY*TOTULPENTRU RO MUNICIPIUL BU'),
		'restaurant' => array('QUICK BEST FOOD - WU X RO MUNICIPIUL BU', 'MCDONALDS ROMANIA SRL RO BUCURESTI',
			'CHOPSTIX CARREFOUR ORH RO MUNICIPIUL BU', 'SUBWAY ORHIDEEA RO CC ORHIDEE', 'KFC MOSILOR RO BUCURESTI',
			'KFC ORHIDEEA RO BUCURESTI', 'QUICK BEST FOOD SRL RO MUNICIPIUL BU',
			'WU XING GRIVITA - QUIC RO MUNICIPIUL BU', 'JPE IANCULUI RO BUCURESTI',
			'NORDSEE BANEASA 1 DEP RO Bucuresti', 'LA SAFI LEBANESE FOOD SRL RO BUCURESTI',
			'NINOTTO AFI PALACE RO BUCURESTI', 'CHOPSTIX VITAN (MLS) RO MUNICIPIUL BU',
			'PIZZA HUT DELIVERY DEP RO BUCURESTI', 'CINNABON COTROCENI 1 RO BUCURESTI',
			'ANDY S PIZZA S.R.L. RO BUCURESTI', 'H.K.RESTAURANT SERVICE SR RO BUCURESTI',
			'IL CALCIO MANAGEMENT RO BUCURESTI', 'SALVADOR PUB DEP RO CONSTANTA',
			'PIZZA DOMINIUM RESTAUR RO MUNICIPIUL BU', 'PLAZZA ROMANIA RO BUCURESTI',
			'KFC- UNIRII BUCURESTI RO MUNICIPIUL BU', 'REST VENETIAN AZZURRO RO BUCURESTI',
			'ROPOTAN FOOD NETWORK SRL RO BUCURESTI', 'FILINI TOP FOOD CO RO BUCURESTI',
			'OSHO - SCS TRADING SRL RO BUCURESTI', 'PIZZICO DEP RO CONSTANTA',
			'AMERICAN REST SYSTEM SA RO BUCURESTI', 'US FOOD NETWORK SA RO BUCURESTI',
			'SBX BUCHAREST VERANDA MAL RO BUCURESTI', 'STARBUCKS COTROCENI RO BUCURESTI',
			'KFC VERANDA RO BUCURESTI', 'SPARTAN DEP RO BUCURESTI', 'MESOPOTAMIA MEGA MALL BUC RO Bucuresti',
			'CHOPSTIX DELIVERY (ML RO MUNICIPIUL BU', 'MOL BUCURESTI PALLADY RO BUCURESTI',
			'SCANDIA BANEASA DEP RO BUCURESTI', 'GLORIA JEANS COFEE C RO BUCURESTI',
			'PREMIER RESTAURANTS ROMAN RO BUCURESTI', 'GYROS THESSALONIKIS - RO MUNICIPIUL BU',
			'DRISTOR KEBAB DEP RO Bucuresti', 'GOLDEN WOKS CHINESE RO BUCURESTI',
			'SLB SUN SRL RO BUCURESTI', 'GPS UNIVERSAL METRO DEP RO VOLUNTARI',
			'US FOOD NETWORK SA 3 RO BUCURESTI', 'NOODLE PACK DEP RO BUCURESTI',
			'SPRINGTIME VICTORIA RO BUCURESTI', 'MEGAIMAGE 0001 LIZEANU RO BUCURESTI',
			'PANTEON TAURINO SRL RO BUCURESTI', 'GOURMET DINING SRL RO BUCURESTI',
			'CINNAMON BAKE & ROLL SRL RO BUCURESTI', 'COFETARIA MAR-VIO DEP RO BUCURESTI',
			'DEUXIEME ELEMENT(LE) BE BRUXELLES/BRU', 'THE CHOCOLATE CROWN BE BRUGGE',
			"JERRY'S BUCURESTI IANCULU RO BUCURESTI", 'STEAKHOUSE RESTAUR C2 RO CONSTANTA',
			'TAKSIM ISTAMBUL DEP RO BUCURESTI', 'RESTAURANT GALERIA BRAN RO BRAN',
			'DAMSTEL PROD SRL RO MAMAIA', 'LA MAMA BUCURESTI DEP RO Bucuresti',
			'BEST GRILL SRL RO BUCURESTI', 'DRISTOR DONER MALL PLAZA RO Bucuresti',
			'AS TRADE INVEST GROUP SRL RO BUCURESTI', "JERRY'S BUCURESTI TITAN RO BUCURESTI",
			'CITY GRILL - BANEASA RO BUCURESTI', 'MOULIN D OR SRL RO BUCURESTI',
			'TRATTORIA DON VITO RO BUCURESTI', 'TACO BELL BANEASA RO BUCURESTI',
			'ORO TORO BANEASA RO BUCURESTI', 'IDRACULA RO BUCURESTI', 'SCANDIA MALL VITAN DEP RO BUCURESTI',
			'NOODLE PACK VERANDA RO BUCURESTI', 'CYCLOP FIX SRL - ANA SI RO CONSTANTA',
			'TAVERNA SARBULUI RO BUCURESTI', 'PIZZA HUT DELIVERY OUT RO BUCURESTI',
			'HARD ROCK CAFFE RO BUCURESTI', 'WU XING GRIVITA I - QU RO MUNICIPIUL BU',
			'NORDSEE AFI DEP RO Bucuresti', 'COFETARIA LUI ANDREI RO BUCURESTI',
			'TIP TOP BUCUR OBOR DEP RO BUCURESTI', 'B1 VERANDA OBOR RO BUCURESTI',
			'CASA JIENILOR RO BUCURESTI', 'STARBUCKS UPGROUND RO BUCURESTI',
			'KFC IANCULUI DRIVE THRU RO BUCURESTI', 'TACO BELL COTROCENI RO BUCURESTI',
			'BACANIA VECHE SRL C1 RO BUCURESTI', 'LAGARDERE TRAVEL RETAIL S RO BUCURESTI',
			'CHOPSTIX VITAN RO BUCURESTI', 'EXPERT NOVO PARK C1 RO BUCURESTI',
			'MEAT POINT COMPANY SRL RO MUNICIPIUL BU', 'NYX*NOVAPROMPT RO Bucharest',
			'NYX*NOVAPROMPT RO Bucuresti', 'YOUNG VENTURE RO ROMANIA',
			'STRADALE OREGON RO BUCURESTI', "JERRY'S BUCURESTI PIPERA RO BUCURESTI",
			'CHOPSTIX PROMENADA - F RO MUNICIPIUL BU', 'OMV 1966/ RO Sarulesti',
			"Q'S INN EXPERIENCE RO BUCURESTI", 'EXPERT PRANZO C4 RO BUCURESTI',
			'KFC IANCULUI RO BUCURESTI', 'CHOPSTIX FEERIA RO BUCURESTI', 'EXPERT PRANZO C3 RO BUCURESTI',
			"JERRY'S CONSTANTA RO CONSTANTA"),
		'pensie' => array('CASA DE PENSII/13601150'),
		'transport' => array('RATB MIHAI BRAVU RO BUCURESTI', 'RATB WITING COLOANE RO BUCURESTI',
			'RATB LIZEANU RO BUCURESTI', 'NMBS BRUGGE TVM BE BRUGGE',
			'UNATTENDED P UNIRII2 RO BUCURESTI', 'UNATTENDED PIATA MUN RO BUCURESTI',
			'UNATTENDED P VICT 2 RO BUCURESTI', 'UNATTENDED OBOR RO BUCURESTI',
			'RATB GROZOVICI RO BUCURESTI', 'UNATTENDED PIPERA RO BUCURESTI',
			'METROREX U M BRAVU RO BUCURESTI', 'TVM MIHAI BRAVU RO BUCURESTI',
			'RATB MAICA DOMNULUI RO BUCURESTI', 'METROREX U OBOR RO BUCURESTI'),
		'farmacie' => array('FARMACIA ANA MARIA DEP RO BUCURESTI', 'AA FARMA LEADER S.R.L. RO BUCURESTI',
			'FARMACIA DONA COLENT RO BUCURESTI', 'SIEPCOFAR SA RO BUCURESTI SEC',
			'DONA 22 COLENTINA 1 RO BUCURESTI', 'BELLADONNA OBOR DEP RO Bucuresti',
			'SENSIBLU PIATA UNIRI RO BUCURESTI', 'ACTION C PROD IMPEX SRL RO BUCURESTI',
			'ELEGANCE OPTIC DEP RO BUCURESTI', 'PLAFAR RETAIL SRL RO BUCURESTI',
			'BELLADONNA 34 DEP RO Bucuresti', 'FARMACIA ARNICA 2 RO BRAILA',
			'SSB VERANDA MALL RO BUCURESTI', 'CATENA FARMACIE COLE RO BUCURESTI',
			'DONA BUCURESTI 22 RO BUCURESTI', 'FARMACIA MAKO SRL RO BUCURESTI',
			'CALIFORNIA FITNESS ROMANI RO BUCURESTI', 'FARMACIA ANA MARIA-ZIDURI RO BUCURESTI',
			'BELLADONNA 15 RO BUCURESTI', 'BEBETEI INVEST C2 RO BUCURESTI', 'FARMACIA ANA MARIA OUT RO BUCURESTI',
			'SENSIBLU SRL RO BUCURESTI', 'IRIS BRAILA 4 DEP RO BRAILA', 'FARMACIA MYOSOTIS 8 RO BRAILA'),
		'distractie' => array('IDM BILIARD RO BUCURESTI', 'IDM CLUB 2 RO BUCURESTI',
			'PayU*eventim.ro RO BUCURESTI', 'FLORARIA HEAVEN FLOWERS RO BUCURESTI',
			'CC COTROCENI DEP RO BUCURESTI',
			'DIVERTA VERANDA MALL RO BUCURESTI', 'IDM CLUB 3 RO BUCURESTI',
			'CARTURESTI COTROCENI RO BUCURESTI', 'IDM CLUB 1 RO BUCURESTI',
			'Amazon UK Marketplace LU 800-279-6620', 'NORIEL 52-02 BUCURES RO BUCURESTI',
			'DIVERTA BANEASA SHOP RO BUCURESTI', 'NORIELTOYS PLAZA ROM RO BUCURESTI',
			'PlatiOn*GIFTOLOGY.R RO BUCURESTI', 'CARTURESTI BANEASA CITY RO BUCURESTI',
			'IDM DEP RO Bucuresti', 'IDM CLUB 4 RO BUCURESTI', 'CLUB TEXAS RO BUCURESTI',
			'IDM CLUB 6 RO BUCURESTI', 'IDM CLUB 7 RO BUCURESTI', 'IDM CLUB 8 RO BUCURESTI',
			'IDM CLUB 10 RO BUCURESTI', 'CARUSEL RO BUCURESTI',
			'NORIEL 52-01 BUCURES RO BUCURESTI', 'CARTURESTI VERANDA RO BUCURESTI',
			'AMZNMktplace GB amazon.co.uk', 'AMZ*Elbenwald GB AMAZON.CO.UK',
			'FUJIFILM VERANDA RO BUCURESTI', 'ERFI KIDS RO Bucuresti',
			'FERMA ANIMALELOR OUT RO PANTELIMON', 'FERMA ANIMALELOR DEP RO PANTELIMON'),
		'medicina' => array('LAB SYNEVO BU LIZEANU RO BUCURESTI', 'CMU ENESCU RO BUCURESTI',
			'REGINA MARIA - CLINI RO BUCURESTI', 'CMU REGINA MARIA RO BUCURESTI',
			'SANADOR SRL RO BUCURESTI', 'SANADOR CLINICA VICTORI RO BUCURESTI',
			'CENTRU MAXILO-FACIAL DEP RO BUCURESTI', 'CLINICA SANADOR RO BUCURESTI',
			'MEDIDENT RO BUCURESTI', 'SPITALUL SANADOR SEV RO BUCURESTI',
			'AUDIO NOVA - DRISTOR RO BUCURESTI', 'SANADOR DECEBAL DEP RO Bucuresti',
			'MEDSANA NR 12 RO BUCURESTI'),
		'casa' => array('IKEA ROMANIA SRL RO BUCURESTI', 'KITCHEN SHOP SRL - FEE RO MUNICIPIUL BU',
			'MOBEXPERT BANEASA RO BUCURESTI', 'LEROY MERLIN ROMANIA SRL RO BUCURESTI',
			'BRICOSTORE ROMANIA SA RO BUCURESTI', 'PECEF TEHNICA SRL RO BUCURESTI',
			'LA MAISON DU JARDIN EU RO BUCHAREST', 'KITCHEN SHOP SRL - VER RO MUNICIPIUL BU',
			'KITCHEN SHOP SRL M BANE RO BUCURESTI', 'ALTEX BUCURESTI OBOR RO BUCURESTI',
			'SC GOLDEN LINE PARTNERS SRL', 'DEDEMAN BANEASA RO BUCURESTI',
			'VENDO ACTIV SRL RO BUCURESTI', 'UNIREA SERVICE CEASU RO BUCURESTI',
			'PAYU *PayU*pcgarage. RO BUCURESTI', 'BUTYVALI SERV SRL RO BUCURESTI',
			'MOBILPAY*DEMAX RO MUNICIPIUL BU', 'PAYU *PayU*bebebliss RO BUCURESTI',
			'PayU*eMAG.ro RO BUCURESTI', 'TEKZEN OBOR C2 RO BUCURESTI',
			'DEDEMAN 086 ION ZAVOI BUC RO BUCURESTI', 'MINISO HOME RO C1 RO BUCURESTI',
			'IKEA ROMANIA SA RO BUCURESTI', 'ALEX GAMA INSTAL SRL', 'ALIEXPRESS.COM GB LONDON',
			'DEPANERO SRL RO BUCURESTI', 'WWW.ITGALAXY.RO RO BUCURESTI', 'MINISO HOME RO C2 RO BUCURESTI',
			'PayU*nichiduta.ro RO BUCURESTI', 'PayU*bestkids.ro RO BUCURESTI',
			'Evision SRL', 'PayU*eMAG.ro/Market RO BUCURESTI', 'PAYU *PayU*eMAG.ro RO BUCURESTI',
			'MOBILPAY*MAMISILEAH RO MUNICIPIUL BU', 'mpy*mobexpert RO BUCURESTI',
			'DEDEMAN 025 BRAILA RO BRAILA', 'e4home.ro CZ Nusle, Praha'),
		'altele' => array('Mocanu Razvan', 'PROZIUM SRL', 'PORSCHE BUCURESTI NO RO VOLUNTARI',
			'CORNELIU NICULITE', 'MOCANU RAZVAN', 'CRISTINA NICULITE', 'Chirita Alexandru - Teodor',
			'CHIRITA ALEXANDRU - TEODOR', 'SORIN CONSTANTIN NICULITE',
			'POBU NORD RO BUCURESTI', 'DIR.GEN.DE ASIST. SOC. MUN. BUC',
			'INSTITUTII PUBLICE ROMANIA', 'DB GLOBAL TECHNOLOGY SRL', 'Vali Petricele',
			'CENTRAL EUROPE TECHNOLOGIES SRL', 'www.admiralmarkets.com GB INTERNET',
			'Petricele Vali - Madalin'),
		'investitii' => array('ADMIRAL MARKETS UK LTD', 'TRADEVILLE SA', 'SCD*Metaquotes CY 31106690521',
			'1/ADMIRAL MARKETS UK LTD'),
		'cazare' => array('HOTEL FERDINAND 2 DEP RO CONSTANTA', 'RESTAURANT BUCEGI RO SINAIA',
			'DALIANA TURISM SRL RO CONSTANTA', 'TRATTORIA AL GALLO - RO BRAN',
			'GINO STYLL SRL RO CONSTANTA', 'dobre si fiii servicii srl', 'SC PERLA BUCEGI SRL',
			'HOTEL BUCEGI DEP RO SINAIA'),
		'depozit' => array('Mocanu Cristian- Romeo'),
		'impozit' => array('DVBL SECTOR 2 - OBOR 1 RO MUNICIPIUL BU',
			'DVBL SECTOR 2 OBOR RO BUCURESTI',
			'WWW.GHISEUL.RO/MFINANTE RO BUCURESTI', 'DIRECTIA VENITURI BUGE RO BUCURESTI')
		);
	foreach ($categorii as $k => $v) {
		if (in_array($beneficiar, $v)) {
			return $k;
		}
	}
	return $beneficiar;
}

function este_categorie_ignorata($categorie) {
	return in_array($categorie, ['depozit', 'altele', 'investitii', 'retragere']);
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
	$text = preg_replace('/Detalii:.+\n.+\n/i', '', file_get_contents($fisier));
	$suma = array();
	$beneficiar = array();
	$tip = array();
	$timp = array();
	foreach (preg_split('/\n/', $text) as $line) {
		while ($line != '') {
			if (preg_match('/\d\d? ((?:' . implode('|', $luni) . ') \d\d\d\d)\s*/i', $line, $matches)) {
				$timp[] = $matches[1];
			} else if (preg_match('/Terminal:(.+)/', $line, $matches)) {
				$beneficiar[] = $matches[1];
			} else if (preg_match('/Beneficiar:(.+)/', $line, $matches)) {
				$beneficiar[] = $matches[1];
			} else if (preg_match('/Ordonator:(.+)/', $line, $matches)) {
				$beneficiar[] = $matches[1];
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
			} else if (preg_match('/Taxe si comisioane\s?/', $line, $matches)) {
				$tip[] = 'comision';
				$beneficiar[] = '';
			} else if (preg_match('/^(\d+\.?\d*,\d\d)$/', $line, $matches)) {
				$suma[] = floatval(str_replace(',', '.', str_replace('.', '', $matches[0])));
			} else {
				break;
			}
			$line = str_replace($matches[0], '', $line);
		}
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
