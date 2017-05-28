<?php
namespace Icerbox\Api\Auth;

use Icerbox\Api\Base;

class Logout extends Base {
	protected $_resource = 'auth/logout';

	protected $_method = 'POST';

	/**
	 * Logout to API
	 * @param array $options
	 * @return bool
	 */
	public function run($options = []) {
		return (bool)parent::run($options)->json()[0]['message'];
	}
}

