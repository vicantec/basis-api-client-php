<?php

namespace BasisApi\RestApi\tools;

use BasisApi\RestApi\BasisApiClient;
use stdClass;

class ServiceMethods {

	/**
	 * @param BasisApiClient $basisApi
	 */
	private $basisApi;

	public function __construct( BasisApiClient $basisApi ) {
		$this->basisApi = $basisApi;
	}

	/**
	 * The method checks WhatsApp account availability on a phone number.
	 *
	 * @param int $phoneNumber
	 *
	 * @return stdClass
	 * @link https://cabinet.basis-api.com/docs/en/api/service/CheckWhatsapp/
	 */
	public function checkWhatsapp( int $phoneNumber ): stdClass {

		$requestBody = [
			'phoneNumber' => $phoneNumber,
		];

		return $this->basisApi->request( 'POST',
			'{{host}}/waInstance{{idInstance}}/CheckWhatsapp/{{apiTokenInstance}}', $requestBody );
	}

	/**
	 * The method returns a user or a group chat avatar.
	 *
	 * @param string $chatId
	 *
	 * @return stdClass
	 * @link https://cabinet.basis-api.com/docs/en/api/service/GetAvatar/
	 */
	public function getAvatar( string $chatId ): stdClass {

		$requestBody = [
			'chatId' => $chatId,
		];

		return $this->basisApi->request( 'POST',
			'{{host}}/waInstance{{idInstance}}/GetAvatar/{{apiTokenInstance}}', $requestBody );
	}

	/**
	 * The method is aimed for getting information on a contact.
	 *
	 * @param string $chatId
	 *
	 * @return stdClass
	 * @link https://cabinet.basis-api.com/docs/en/api/service/GetContactInfo/
	 */
	public function getContactInfo( string $chatId ): stdClass {

		$requestBody = [
			'chatId' => $chatId,
		];

		return $this->basisApi->request( 'POST',
			'{{host}}/waInstance{{idInstance}}/GetContactInfo/{{apiTokenInstance}}', $requestBody );
	}

	/**
	 * The method is aimed for getting a list of the current account contacts. Send contacts of all recipients
	 * whom the account connected with. Parameter "contact name" "name" takes on a value based on the
	 * below criteria: If the account is recorded in the phonebook, then we get the name from the book;
	 * If the account is not recorded in the phonebook, then we get the name from WhatsApp account;
	 * If the account is not recorded in the phone book and WhatsApp account name is not assigned, then we get an empty
	 * field.
	 *
	 * @return stdClass
	 * @link https://cabinet.basis-api.com/docs/en/api/service/GetContacts/
	 */
	public function getContacts(): stdClass {

		return $this->basisApi->request( 'GET',
			'{{host}}/waInstance{{idInstance}}/GetContacts/{{apiTokenInstance}}' );
	}


	/**
	 * The method archives a chat. You can archive chats that have at least one incoming message.
	 *
	 * @param string $chatId
	 *
	 * @return stdClass
	 * @link https://cabinet.basis-api.com/docs/en/api/service/ArchiveChat/
	 */
	public function archiveChat( string $chatId ): stdClass {

		$requestBody = [
			'chatId' => $chatId,
		];

		return $this->basisApi->request( 'POST',
			'{{host}}/waInstance{{idInstance}}/ArchiveChat/{{apiTokenInstance}}', $requestBody );
	}


	/**
	 * The method deletes a message from a chat.
	 *
	 * @param string $chatId
	 * @param string $idMessage
	 *
	 * @return stdClass
	 * @link https://cabinet.basis-api.com/docs/en/api/service/DeleteMessage/
	 */
	public function deleteMessage( string $chatId, string $idMessage ): stdClass {

		$requestBody = [
			'chatId' => $chatId,
			'idMessage' => $idMessage,
		];

		return $this->basisApi->request( 'POST',
			'{{host}}/waInstance{{idInstance}}/DeleteMessage/{{apiTokenInstance}}', $requestBody );
	}

	/**
	 * The method unarchives a chat.
	 *
	 * @param string $chatId
	 *
	 * @return stdClass
	 * @link https://cabinet.basis-api.com/docs/en/api/service/unarchiveChat/
	 */
	public function unarchiveChat( string $chatId ): stdClass {

		$requestBody = [
			'chatId' => $chatId,
		];

		return $this->basisApi->request( 'POST',
			'{{host}}/waInstance{{idInstance}}/UnarchiveChat/{{apiTokenInstance}}', $requestBody );
	}

	/**
	 * The method is aimed for changing settings of disappearing messages in chats. The standard settings of the
	 * application are used: 0 (off), 86400 (24 hours), 604800 (7 days), 7776000 (90 days).
	 *
	 * @param string $chatId
	 * @param int $ephemeralExpiration
	 *
	 * @return stdClass
	 * @link https://cabinet.basis-api.com/docs/en/api/service/SetDisappearingChat/
	 */
	public function setDisappearingChat( string $chatId, int $ephemeralExpiration ): stdClass {

		$requestBody = [
			'chatId' => $chatId,
			'ephemeralExpiration' => $ephemeralExpiration,
		];

		return $this->basisApi->request( 'POST',
			'{{host}}/waInstance{{idInstance}}/SetDisappearingChat/{{apiTokenInstance}}', $requestBody );
	}

}
