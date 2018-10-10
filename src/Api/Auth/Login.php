<?php
namespace Icerbox\Api\Auth;

use Icerbox\Api\Base;
use Icerbox\Api\Exception as BaseException;

class Login extends Base {
	protected $_resource = 'auth/login';

	protected $_method = 'POST';

	/**
	 * @var bool
	 */
	protected $_isTokenRequired = false;

	/**
	 * Login to API
	 *
	 * @param $options [login, password, g-recaptcha-response]
	 * @return string
	 * @throws Exception
	 * @throws BaseException
	 */
	public function run($options = []) {
		try {
			return parent::run(['json' => $options])->json()['token'];
		} catch (BaseException $e) {
			if ($e->getCode() == Exception::CODE_CAPTHA) {
				throw new Exception("Captcha: {$e->getMessage()}", $e->getCode());
			} else {
				throw $e;
			}
		}
	}
}

