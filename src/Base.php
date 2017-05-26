<?php
namespace Icerbox;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

abstract class Base {
	// url with placeholder to query
	const URL = "https://icerbox.com/api/v{version}/";
	const VERSION = 1;

	const AUTH_HEADER = 'Authorization';

	/**
	 * Request resource url
	 * @var string
	 */
	protected $_resource = null;

	/**
	 * Default request method
	 * @var string
	 */
	protected $_method = 'GET';

	/**
	 *
	 * @var \GuzzleHttp\Client
	 */
	protected $_Client = null;

	public function __construct($token = null) {
		$this->_Client = new Client(['base_url' => [self::URL, ['version' => self::VERSION]]]);
		// default header auth option
		if (!empty($token)) {
			$this->_Client->setDefaultOption(self::AUTH_HEADER, sprintf("Bearer %s", $token));
		}
	}

	/**
	 * Make request with options
	 * @param array $options
	 * @return \GuzzleHttp\Message\ResponseInterface
	 * @throws Exception
	 */
	public function run($options = []) {
		try {
			$Response = $this->_Client->send(
				$this->_Client->createRequest($this->_method, $this->_resource, $options)
			);
			return $Response;
		} catch (ClientException $e) {
			// invalid response
			throw new Exception($e->getMessage(), $e->getResponse()->getStatusCode());
		}
	}
}