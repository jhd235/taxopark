<?php
/**
 * Created by PhpStorm.
 * User: jhd235
 * Date: 7/27/18
 * Time: 9:22 PM
 */
$places = 0;
$drivers = [];

//прилетел точно POST?
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
	throw new Exception('метод должен быть POST!');
}

//тип контента валидный?
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
	throw new Exception('контент должен быть = application/json');
}

//принимаем сырые данные
$raw_data = trim(file_get_contents("php://input"));

//декодируем прилетеқшие данные как JSON
$json_data = json_decode($raw_data, true);

//этот обьект имеет нужную стурктуру?
if(!is_array($json_data)){
	throw new Exception('Принятые данные не были в формате JSON!');
}

foreach($json_data as $taxopark) {
	$places = $taxopark['places'];
	echo $places, '<br>';
	$drivers = $taxopark['drivers'];
}

foreach($drivers as $driver) {

	echo $driver['name'], '<br>';
	echo $driver['type'], '<br>';
}