<?php


function convertData($dataConvert)
{

	if ($dataConvert == '00000000' || ' '){
		return $dataConvert = '1111-11-11';
	} else {
		return $dataConvert = DateTime::createFromFormat('dmY', $dataConvert)->format('Y-m-d');
	}
}

function convertTime($timeConvert)
{
	if ($timeConvert == '000000'){
		return $timeConvert = NULL;
	} else {
		return $timeConvert = DateTime::createFromFormat('His', $timeConvert)->format('His');
	}
}

function convertDataOito($dataConvert)
{
	if ($dataConvert == '000000'){
		return $dataConvert = null;
	} elseif (strlen($dataConvert) == 6){
		return "20".$dataConvert;
	}
}

function isNull($isNull)
{
	if ($isNull = ' '){
		return $isNull = NULL;
	}
}
