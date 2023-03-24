<?php

namespace BasisApi\RestApi\tools;

use BasisApi\RestApi\BasisApiClient;
use stdClass;

class Journals {

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
	 * @param string $count
	 *
	 * @return stdClass
	 * @link https://basis-api.com/en/docs/api/journals/GetChatHistory/
	 */
	public function getChatHistory( string $chatId, string $count ): stdClass {

		$requestBody = [
			'chatId' => $chatId,
			'count' => $count,
		];

		return $this->basisApi->request( 'POST',
			'{{host}}/waInstance{{idInstance}}/GetChatHistory/{{apiTokenInstance}}', $requestBody );
	}

	/**
	 * The method returns the chat message history.
	 *
	 * @return stdClass
	 * @link https://basis-api.com/en/docs/api/journals/LastIncomingMessages/
	 */
	public function lastIncomingMessages(): stdClass {

		return $this->basisApi->request( 'GET',
			'{{host}}/waInstance{{idInstance}}/LastIncomingMessages/{{apiTokenInstance}}' );
	}

	/**
	 * The method returns the last outgoing messages of the account. Outgoing messages are stored on the server for 24
	 * hours.
	 *
	 * @return stdClass
	 * @link https://basis-api.com/en/docs/api/journals/LastOutgoingMessages/
	 */
	public function lastOutgoingMessages(): stdClass {

		return $this->basisApi->request( 'GET',
			'{{host}}/waInstance{{idInstance}}/LastOutgoingMessages/{{apiTokenInstance}}' );
	}
}
