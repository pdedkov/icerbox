<?php
namespace Icerbox\Api;

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

	/**
	 * current token
	 * @var string
	 */
	protected $_token = null;

	/**
	 * Is token requires for current action
	 * @var bool
	 */
	protected $_isTokenRequired = true;

	public function __construct() {
		$this->_Client = new Client(['base_url' => [self::URL, ['version' => self::VERSION]]]);
	}

	/**
	 * Change current token
	 *
	 * @param string $token
	 * @return this
	 */
	public function setToken($token) {
		$this->_token = $token;
		$this->_Client->setDefaultOption('headers', [self::AUTH_HEADER => sprintf("Bearer %s", $this->_token)]);

		return $this;
	}

	/**
	 * Make request with options
	 * @param array $options
	 * @return \GuzzleHttp\Message\ResponseInterface
	 * @throws Exception
	 */
	public function run($options = []) {
		if (empty($this->_token) && $this->_isTokenRequired) {
			throw new Exception("I need to setup token before request");
		}

		try {
			$Response = $this->_Client->send(
				$this->_Client->createRequest($this->_method, $this->_resource, $options)
			);
			return $Response;
		} catch (ClientException $e) {
			throw new Exception($e->getMessage(), $e->getResponse()->getStatusCode());
		}
	}
}