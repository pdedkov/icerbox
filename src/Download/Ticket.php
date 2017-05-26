<?php
namespace Icerbox\Download;

use Icerbox\Base;
use GuzzleHttp\Exception\ClientException;

class Ticket extends Base {
	protected $_resource = 'dl/ticket';

	protected $_method = 'POST';

	/**
	 * Logout to API
	 * @param array $options
	 * @return string path to file
	 * @throws Exception
	 */
	public function run($options = []) {
		$url = parent::run(['file' => $options['file']])->json()['url'];
		try {
			$this->_Client->get($url, ['sink' => $options['path']]);
		} catch (ClientException $e) {
			// invalid response
			throw new Exception($e->getMessage(), $e->getResponse()->getStatusCode());
		}

		return $options['path'];
	}
}

