<?php
// Abre ou cria o arquivo bloco1.txt
// "a" representa que o arquivo é aberto para ser escrito
$fp = fopen('/fileStats/bloco1.txt', 'a');

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, "exemplo de escrita");

if(!$fp)
{
	echo "Deu erro para abrir!";
}

// Fecha o arquivo
fclose($fp);


?>
// Comentaŕio
