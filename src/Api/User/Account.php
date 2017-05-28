<?php
namespace Icerbox\Api\User;

use Icerbox\Api\Base;

class Account extends Base {
	protected $_resource = 'user/account';

	/**
	 * Refresh token
	 * @param array $options
	 * @return array user data
	 */
	public function run($options = []) {
		return parent::run($options)->json();
	}
}
