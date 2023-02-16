<?php

namespace BasisApi\RestApi\tools;

use BasisApi\RestApi\BasisApiClient;
use stdClass;

class Device {

	/**
	 * @param BasisApiClient $basisApi
	 */
	private $basisApi;

	public function __construct( BasisApiClient $basisApi ) {
		$this->basisApi = $basisApi;
	}

	/**
	 * The method is aimed for getting information about the device (phone) running WhatsApp Business application.
	 *
	 * @return stdClass
	 */
	public function getDeviceInfo(): stdClass {

		return $this->basisApi->request( 'GET',
			'{{host}}/waInstance{{idInstance}}/GetDeviceInfo/{{apiTokenInstance}}' );
	}
}
