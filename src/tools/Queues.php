<?php

namespace BasisApi\RestApi\tools;

use BasisApi\RestApi\BasisApiClient;
use stdClass;

class Queues {

	/**
	 * @param BasisApiClient $basisApi
	 */
	private $basisApi;

	public function __construct( BasisApiClient $basisApi ) {
		$this->basisApi = $basisApi;
	}

	/**
	 * @return stdClass
	 * @link https://basis-api.com/en/docs/api/queues/ClearMessagesQueue/
	 */
	public function clearMessagesQueue(): stdClass {

		return $this->basisApi->request( 'GET',
			'{{host}}/waInstance{{idInstance}}/ClearMessagesQueue/{{apiTokenInstance}}' );
	}

	/**
	 * The method is aimed for getting a list of messages in the queue to be sent. Messages sending rate is managed by
	 * Messages sending delay parameter.'
	 *
	 * @return stdClass
	 * @link https://basis-api.com/en/docs/api/queues/ShowMessagesQueue/
	 */
	public function showMessagesQueue(): stdClass {

		return $this->basisApi->request( 'GET',
			'{{host}}/waInstance{{idInstance}}/ShowMessagesQueue/{{apiTokenInstance}}' );
	}
}
