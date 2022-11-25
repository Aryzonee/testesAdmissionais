<?php
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




function mediaSimples(array $notas){

    $quantidadeDeItens = count($notas);
    if ($quantidadeDeItens < 3){
        return false;
    }
    return array_sum($notas)/ $quantidadeDeItens;
    
}


   
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




function inverterString(string $string):string{
    return strrev($string);
}




function substituirCaracteres(string $string):string{
    $vogais = ['a','e','i','o','u'];
    foreach($vogais as $vogal){
        $vogalMaiuscula = mb_strtoupper($vogal);
        
        $string = str_replace($vogal,"?",$string);
        $string = str_replace($vogalMaiuscula,"?",$string);

    }
    
    return $string;
}




function ordenarArray(array $array):array{
   	asort($array);
       return $array;
    
}


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
 interfaces: com ela é possivel referênciar instancia da classes tendo apenas acesso aos membros definidos na interface.
 
 objeto: é interpretação de qualquer coisa (real ou abstrata) do mundo real  que vai ser manipulado ou armazenado.

 classe: é um aglomerado de objetos que posuem atributos e comportamentos em comum.
 

 
*/