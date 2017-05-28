<?php
namespace Icerbox\Api\Download;

use Icerbox\Api\Base;

class Ticket extends Base {
	protected $_resource = 'dl/ticket';

	protected $_method = 'POST';

	/**
	 * Logout to API
	 * @param array $options
	 * @return string path to downloads
	 * @throws Exception
	 */
	public function run($options = []) {
		return parent::run(['json' => $options])->json()['url'];
	}
}

