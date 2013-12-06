<?php
function retira_acentos($texto)
{
$array1 = array( "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
, "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" );
$array2 = array( "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
, "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );
return str_replace($array1, $array2, $texto);
}

include "statsCopa.php";

foreach($vetor as $k => $v)
{
	$dados = file_get_contents($vetor[$k]);

	$dados = utf8_encode($dados);
	$dados = retira_acentos($dados);
	$dados = strtolower($dados);
	//$dados = str_replace(" ", "-", $dados);
	$tam = strlen($dados);
	$inicio = strpos($dados,'{');
	$dados = substr($dados, $inicio, ($tam-$inicio-2));//substr($string, $start, $lenght)

	$dadosArray = json_decode($dados, true);
	//$error = json_last_error();//Verifica erros no json_decode()
	//echo <p>Codigo do erro: ".$error."</p>";

	//Dados da rodada

	//echo "<pre>";
	//print_r($dadosArray);
	//echo "</pre>";

	//Converte a data do jogo em array ([0]=>ano, [1]=>mes, [2]=>dia)
	$dadosArray["dados"]["infojogo"]["data"] = explode("-", $dadosArray["dados"]["infojogo"]["data"]);

	$time1 = $dadosArray["dados"]["infojogo"]["nometime1"];
	$time2 = $dadosArray["dados"]["infojogo"]["nometime2"];
	$dia = $dadosArray["dados"]["infojogo"]["data"][2];
	$mes = $dadosArray["dados"]["infojogo"]["data"][1];

	$filename = $time1."-x-".$time2."-".$dia."-".$mes.".js";
	$filename = str_replace(" ", "-", $filename);
	//echo $filename;

	$fp = fopen('/fileStatsCopa2010/'.$filename,'w');
	fwrite($fp,$dados);
	fclose($fp);
}

//Dados da rodada com data em array
/*
echo "<pre>";
print_r($dados);
echo "</pre>";
*/

?>