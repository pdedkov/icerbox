<?php
namespace Icerbox\Api;

class Files extends Base {
	protected $_resource = 'files';

	protected $_method = 'GET';

	/**
	 * @var bool
	 */
	protected $_isTokenRequired = false;

	/**
	 * Get file info
	 * @param array $options
	 * @return array file info
	 */
	public function run($options = []) {
		return parent::run(['query' => ['ids' => implode(',', $options['ids'])]])->json()['data'];
	}
}