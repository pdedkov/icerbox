<?php
namespace Icerbox\Auth;

use Icerbox\Base;

class Refresh extends Base {
	protected $_resource = 'auth/refresh';

	protected $_method = 'POST';

	/**
	 * Refresh token
	 * @param array $options
	 * @return string new token
	 */
	public function run($options = []) {
		return parent::run($options)->json()['token'];
	}
}

