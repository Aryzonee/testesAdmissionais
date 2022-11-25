<?php


/*
 A função recebe um inteiro entre 1 e 12 e retorna o mês correspondente por extenso. Caso o mês informado não esteja entre 1 e 12, deverá ser retornado "Mes Inexistente"
 * Ex: input: 1 	- output: "Janeiro"
 * Ex: input: 13 	- output: "Mês Desconhecido"
*/

function mesCorrespondente(int $numerodoMes):string{
$nomeDoMes = [
  "Janeiro", "Fevereiro",
  "Março", "Abril",
  "Maio", "Junho",
  "Julho", "Agosto",
  "Setembro", "Outubro",
  "Novembro", "Dezembro"];

 
  return $nomeDoMes[$numerodoMes-1] ?: "mes invalido";
}


/*
 * A função deverá receber um array com pelo menos 3 itens e retornar a média simples de todos os itens do array.
 * Caso o array recebido possua menos que 3 itens, deverá ser retornado o boleano false.
 * Ex: input: [4,6,8] 	- output 6
 * Ex: input: [1,2] 	- output false
*/


function mediaSimples(array $notas){

    $quantidadeDeItens = count($notas);
    if ($quantidadeDeItens < 3){
        return false;
    }
    return array_sum($notas)/ $quantidadeDeItens;
    
}

/*
 * A função deverá receber um array com pelo menos 3 itens e retornar a média simples de todos os itens do array.
 * Caso o array recebido possua menos que 3 itens, deverá ser retornado o boleano false.
 * Ex: input: [4,6,8] 	- output 6
 * Ex: input: [1,2] 	- output false
   */

function parOuImpar(array $numeros){
    $quantidadeDeNumerosPares = 0;
    foreach($numeros as $numero){
        $numeroPar = $numero %2 === 0;
        if ($numeroPar){
            $quantidadeDeNumerosPares ++;
        }
    }
    
     return $quantidadeDeNumerosPares;
}

/*
 * A função deverá receber uma string e retornar a mesma invertida.
 * Ex: input: "bar" - output: "rab"
*/

function inverterString(string $string):string{
    return strrev($string);
}


/*
* A função deverá receber uma string e substituir todas as vogais da mesma pelo sinal '?'
 * Ex: input: 'Bar' - output: 'B?r'
 *
*/


function substituirCaracteres(string $string):string{
    $vogais = ['a','e','i','o','u'];
    foreach($vogais as $vogal){
        $vogalMaiuscula = mb_strtoupper($vogal);
        
        $string = str_replace($vogal,"?",$string);
        $string = str_replace($vogalMaiuscula,"?",$string);

    }
    
    return $string;
}


/*
* A função deverá receber um array de inteiros como parâmetro e deverá retornar o mesmo array ordenado em ordem crescente.
 * Ex: Input: [5,1,0,7,3,3] - Output: [0,1,3,3,5,7]

*/


function ordenarArray(array $array):array{
   	asort($array);
       return $array;
    
}

/*
* A função será utilizada em um sistema de caixa.
 * Ela receberá um valor inteiro, representando o valor a ser sacado e um array contendo quais tipos de cédulas ela tem disponível.
 * O array de cédulas disponiveis indica quais valores de cédulas existirão no caixa, a quantidade das mesmas é ilimitada. No caso do input [2,5,50], o caixa terá quantidades ilimitadas de notas de 2, 5 e 50 para devolver ao cliente.
 * A função deverá retornar o mínimo de cédulas necessarias possivel para o saque em formato de um array, cuja chave seja o valor da cédula e o valor a quantidade daquela cédula que será sacada.
 *
 * Ex: input: 150 & [5, 50, 100] 	- output: ["100"=>1, "50"=>1].
 * Ex: input: 150 e [2, 5, 10] 		- output: ["10"=>15].
 */


function menorNumeroNotas(int $valor, array $cedulas):array{
   arsort($cedulas);
   
    $saque =[];
    foreach($cedulas as $cedula){
        if ($cedula > $valor){
            continue;
        }
        $quantidadeDeCedulas = 0;
        while($valor-$cedula >= 0){
            $valor -= $cedula;
            $quantidadeDeCedulas ++;
        }
        if($quantidadeDeCedulas){
            $saque[$cedula]= $quantidadeDeCedulas;
            
        }
    }
    
    return $saque;
}

 /*
 * A função deverá ler o arquivo data.dat e retornar o número de linhas que atende pelo menos uma das condições abaixo:
 * 1 - A quantidade de números zeros na linha é um multiplo de 3
 * 2 - A quantidade de números 1 é um multiplo de 2
 */

function manipulacaoArquivo(): int {
	$quantidadeDeLinhas = 0;
	$data = file_get_contents(__DIR__ ."/data.dat");
	$dataArray = explode("\n", $data);
	foreach ($dataArray as  $line) {
		$lineArray = str_split($line);
		$numeroZero = array_filter($lineArray,function($number){return $number === '0';});
	    $numeroUm = array_filter($lineArray,function($number){return $number === '1';});

	    $numeroZeroEMultiploDeTres= count($numeroZero) % 3 === 0 ;
	    $numeroUmEMultiploDeDois= count($numeroUm) % 2 === 0;
	     if($numeroZeroEMultiploDeTres || $numeroUmEMultiploDeDois){
	     	$quantidadeDeLinhas++;
	     }
     
	}
	return $quantidadeDeLinhas;
}

/*

 * Escreva a diferença entre interfaces, instancias, objetos e classes no contexto de orientação a objeto:
 
 interfaces: com ela é possivel referênciar instancia da classes tendo apenas acesso aos membros definidos na interface.
 
 objeto: é interpretação de qualquer coisa (real ou abstrata) do mundo real  que vai ser manipulado ou armazenado.

 classe: é um aglomerado de objetos que posuem atributos e comportamentos em comum.
 

 
*/
