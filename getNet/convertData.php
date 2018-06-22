<?php 


function convertData($dataConvert)
{
	
	if ($dataConvert == '00000000'){
		return $dataConvert = '2018-06-22';	
	} else {
		return $dataConvert = DateTime::createFromFormat('dmY', $dataConvert)->format('Y-m-d');
	}
}

function convertTime($timeConvert)
{	
	if ($timeConvert == '000000'){
		return $timeConvert = null;
	} else {
		return $timeConvert = DateTime::createFromFormat('His', $timeConvert)->format('His');
	}
}