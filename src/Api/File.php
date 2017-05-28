<?php
namespace Icerbox\Api;

class File extends Base {
	protected $_resource = 'file';

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
		return parent::run($options)->json()['data'];
	}
}