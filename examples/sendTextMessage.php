<?php
require 'vendor\autoload.php';

use BasisApi\RestApi\BasisApiClient;

define( "API_HOST", getenv("API_HOST"));
define( "ID_INSTANCE", getenv("ID_INSTANCE" ));
define( "API_TOKEN_INSTANCE", getenv("API_TOKEN_INSTANCE") );

$basisApi = new BasisApiClient( ID_INSTANCE, API_TOKEN_INSTANCE, API_HOST);

$result = $basisApi->sending->sendMessage('11001234567@c.us', 'Message text');

print_r(  $result->data );
