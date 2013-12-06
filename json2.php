<?php
function retira_acentos($texto)
{
$array1 = array( "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
, "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" );
$array2 = array( "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
, "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );
return str_replace($array1, $array2, $texto);
} 
//URL de um jogo isolado
$url = 'http://esporte.uol.com.br/futebol/campeonatos/brasileiro/2012/serie-a/estatisticas/jogos/botafogo-x-sao-paulo-20-05.js';

//Pega os dados do jogo e converte para UTF-8
$dados = file_get_contents($url);
$dados = utf8_encode($dados);

//Retira as informações desnecessarias
$tam = strlen($dados);
$inicio = strpos($dados,'{');
$dados = substr($dados, $inicio, ($tam-$inicio-2));//substr($string, $start, $lenght)

//echo "<p>".$dados."</p>";

//Transforma a string em array
$dados = json_decode($dados, true);

//Verifica erros no json_decode()
$error = json_last_error();
echo "<p>Codigo do erro: ".$error."</p>";

//Imprime os dados do jogo isolado
echo "<pre>";
print_r($dados);
echo "</pre>";

//Converte a data do jogo em array ([0]=>ano, [1]=>mes, [2]=>dia)
//Isso eh do arquivo json.php, aqui deve se mudar o array para funcionar
/*
foreach($dados["jogos"] as $k => $v)
{
	$dados["jogos"][$k]["datajogo"] = explode("-", $dados["jogos"][$k]["datajogo"]);
}
*/

//Dados da rodada com data em array
/*
echo "<pre>";
print_r($dados);
echo "</pre>";
*/


?>
