<?php

namespace BasisApi\RestApi\tools;

use BasisApi\RestApi\BasisApiClient;

class Webhooks {

	/**
	 * @param BasisApiClient $basisApi
	 */
	private $basisApi;

	private $started = false;

	public function __construct( BasisApiClient $basisApi ) {
		$this->basisApi = $basisApi;
	}

	public function startReceivingNotifications( $onEvent ) {
		$this->started = true;
		$this->job( $onEvent );
	}

	public function stopReceivingNotifications() {
		$this->started = false;
	}

	public function job( $onEvent ) {
		print( 'Incoming notifications are being received.' ) . PHP_EOL;

		while ( $this->started ) {
			$resultReceive = $this->basisApi->receiving->receiveNotification();
			if ( $resultReceive->code == 200 ) {
				if ( empty( $resultReceive->data ) ) {
					# There are no incoming notifications,
					# we send the request again
					continue;
				}
				$body = $resultReceive->data->body;
				$typeWebhook = $body->typeWebhook;
				$onEvent( $typeWebhook, $body );
				$this->basisApi->receiving->deleteNotification( $resultReceive->data->receiptId );
				continue;
			}
			sleep(1);
		}
		print( 'End receiving' );
	}
}
