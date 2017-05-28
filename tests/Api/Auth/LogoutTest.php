<?php
namespace Icerbox\Tests\Api\Auth;

use Icerbox\Api\Auth;

class LogoutTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @var \Icerbox\Api\Auth\Logout
	 */
	protected $_Logout = null;

	public function setUp() {
		parent::setUp();
		$this->_Logout = new Auth\Logout();
	}

	/**
	 * Test should logout
	 */
	public function testShouldLogoutToApi() {
		if (!file_exists(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config.php')) {
			$this->markTestSkipped("Please configure");
		}
		$config = require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config.php';

		$Login = new Auth\Login();
		$token = $Login->run($config);
		$this->assertTrue($this->_Logout->setToken($token)->run());
	}
}