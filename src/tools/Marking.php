<?php

namespace BasisApi\RestApi\tools;

use BasisApi\RestApi\BasisApiClient;
use stdClass;

class Marking {

	/**
	 * @param BasisApiClient $basisApi
	 */
	private $basisApi;

	public function __construct( BasisApiClient $basisApi ) {
		$this->basisApi = $basisApi;
	}

	/**
	 * The method returns the chat message history.
	 *
	 * @param string $chatId
	 * @param string $idMessage
	 *
	 * @return stdClass
	 * @link https://cabinet.basis-api.com/docs/en/api/marks/ReadChat/
	 */
	public function readChat( string $chatId, string $idMessage ): stdClass {

		$requestBody = [
			'chatId' => $chatId,
			'idMessage' => $idMessage,
		];

		return $this->basisApi->request( 'POST',
			'{{host}}/waInstance{{idInstance}}/ReadChat/{{apiTokenInstance}}', $requestBody );
	}
}
