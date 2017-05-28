<?php
namespace Icerbox\Tests\Api\Auth;

use Icerbox\Api\Auth;

class LoginTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @var \Icerbox\Api\Auth\Login
	 */
	protected $_Login = null;

	public function setUp() {
		parent::setUp();
		$this->_Login = new Auth\Login();
	}

	/**
	 * @expectedException \Icerbox\Api\Exception
	 */
	public function testShouldFailWithException() {
		$this->_Login->run(['email' => 'email', 'password' => 'password']);
	}
	/**
	 * Test should login API with user and password from config.php
	 */
	public function testShouldLoginToApi() {
		if (!file_exists(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config.php')) {
			$this->markTestSkipped("Please configure");
		}
		$config = require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config.php';

		$this->assertTrue(is_string($this->_Login->run($config)));
	}
}