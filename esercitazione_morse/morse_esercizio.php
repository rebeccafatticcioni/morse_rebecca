<html>
<head>
<title>  traduttore in codice morse</title>
</head>
<body>
<br>
<?php
$traduttore = array(
'a' => '.-',
'b' => '-...',
'c' => '-.-.',
'd' => '-..',
'e' => '.',
'f' => '..-.',
'g' => '--.',
'h' => '....',
'i' => '..',
'j' => '.---',
'k' => '-.-',
'l' => '.-..',
'm' => '--',
'n' => '-.',
'o' => '---',
'p' => '.--.',
'q' => '--.-',
'r' => '.-.',
's' => '...',
't' => '-',
'u' => '..-',
'v' => '...-',
'w' => '.--',
'x' => '-..-',
'y' => '-.--',
'z' => '--..',
);
function Testo_To_Morse($testo, $mappa) {
    $morse = '';

    for ($i = 0; $i < strlen($testo); $i++) {
        $carattere = $testo[$i];
        if ($carattere === ' ') {
            $morse .= '/ ';
        } elseif (isset($mappa[$carattere])) {
            $morse .= $mappa[$carattere] . ' ';
        } else {
            $morse .= '[?] ';
        }
    }

    return $morse;
}
	
	function Morse_To_Testo($morse, $mappa) {
    $testo = '';
    $morse = $morse;
    $simboli = explode(' ', $morse); // Ogni simbolo Morse è separato da spazio

    for ($i = 0; $i < count($simboli); $i++) {
        $codice = $simboli[$i];
        $trovato = false;

        for ($j = 0; $j < count($mappa); $j++) {
            $chiave = array_keys($mappa)[$j];
            $valore = array_values($mappa)[$j];

            if ($codice === $valore) {
                $testo .= $chiave;
                $trovato = true;
                break;
            }
        }
		}
		 return $testo;
    }
	$nome='';
	$risultato='';
   if(isset($_POST['n'])and $_POST['n']!==''){
	   $nome=$_POST['n'];
	  $risultato=Testo_To_Morse($nome,$traduttore);
	   
   }else if(isset($_POST['t']) and $_POST['t']!==''){
	   $risultato=$_POST['t'];
	   $nome=Morse_To_Testo($risultato,$traduttore);
	   
	   
   }
   
?>
<form action="/esercitazione_morse/morse_esercizio.php" method= "post">
testo:<input type="text" name="n" value="<?php echo $nome?>"> <br><br>
morse:<input type="text" name="t" value="<?php echo $risultato?>"> <br>
<input type="Submit" name="Submit">
</form>
</body>
<html>




