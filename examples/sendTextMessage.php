<?php
require 'vendor\autoload.php';

use BasisApi\RestApi\BasisApiClient;

define( "ID_INSTANCE", getenv("ID_INSTANCE" ));
define( "API_TOKEN_INSTANCE", getenv("API_TOKEN_INSTANCE") );

$basisApi = new BasisApiClient( ID_INSTANCE, API_TOKEN_INSTANCE );

$result = $basisApi->sending->sendMessage('11001234567@c.us', 'Message text');

print_r(  $result->data );
