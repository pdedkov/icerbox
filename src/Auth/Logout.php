<?php
namespace Icerbox\Auth;

use Icerbox\Base;

class Logout extends Base {
	protected $_resource = 'auth/logout';

	protected $_method = 'POST';

	/**
	 * Logout to API
	 * @param array $options
	 * @return bool
	 */
	public function run($options = []) {
		return (bool)parent::run($options)->json()['message'];
	}
}

