<?php
namespace Icerbox\Api;

class Folder extends Base {
	protected $_resource = 'folder';

	protected $_method = 'GET';

	/**
	 * @var bool
	 */
	protected $_isTokenRequired = false;

	/**
	 * Get file info
	 * @param array $options
	 * @return arrat file info
	 */
	public function run($options = []) {
		return parent::run($options)->json();
	}
}