<?php

function convertData($data)
{
	if (substr($data, 4, 2) == '20' && strlen($data) > 6) { //1010'20'18
		$data = DateTime::createFromFormat('dmY', $data)->format('Ymd'); //2018-10-10
		return $data;

	} elseif ($data == '00000000' || '000000' || '' || ' '){

		return $data = NULL;
	}
}
