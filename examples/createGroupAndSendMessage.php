<?php
require 'vendor\autoload.php';

use BasisApi\RestApi\BasisApiClient;

define( "API_HOST", getenv("API_HOST"));
define( "ID_INSTANCE", getenv("ID_INSTANCE" ));
define( "API_TOKEN_INSTANCE", getenv("API_TOKEN_INSTANCE") );

$basisApi = new BasisApiClient( ID_INSTANCE, API_TOKEN_INSTANCE, API_HOST);

$chatIds = [
	'11001234567@c.us'
];

$resultCreate = $basisApi->groups->createGroup('GroupName', $chatIds );

if ($resultCreate->code == 200) {
	print_r($resultCreate->data).PHP_EOL;
	$resultSend = $basisApi->sending->sendMessage($resultCreate->data->chatId, 'Message text');
	if ($resultSend->code == 200)
		print_r( $resultSend->data ) . PHP_EOL;
	else
		print( $resultSend->error ) . PHP_EOL;
} else
	print( $resultCreate->error ) . PHP_EOL;
