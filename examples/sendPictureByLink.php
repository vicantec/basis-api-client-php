<?php
require 'vendor\autoload.php';

use BasisApi\RestApi\BasisApiClient;

define( "API_HOST", getenv("API_HOST" ));
define( "ID_INSTANCE", getenv("ID_INSTANCE" ));
define( "API_TOKEN_INSTANCE", getenv("API_TOKEN_INSTANCE") );

$basisApi = new BasisApiClient( ID_INSTANCE, API_TOKEN_INSTANCE, API_HOST);

$result = $basisApi->sending->sendFileByUrl(
	'11001234567@c.us',
	'https://www.google.ru/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
	'googlelogo_color_272x92dp.png',
	'Google logo'
);

print_r(  $result->data );
