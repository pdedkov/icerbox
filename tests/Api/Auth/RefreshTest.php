<?php
namespace Icerbox\Tests\Api\Auth;

use Icerbox\Api\Auth;

class RefreshTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @var \Icerbox\Api\Auth\Refresh
	 */
	protected $_Refresh = null;

	public function setUp() {
		parent::setUp();
		$this->_Refresh = new Auth\Refresh();
	}

	/**
	 * Test should refresh API token
	 */
	public function testShouldRefreshApiToken() {
		if (!file_exists(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config.php')) {
			$this->markTestSkipped("Please configure");
		}
		$config = require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config.php';

		$Login = new Auth\Login();
		$token = $Login->run($config);

		$newToken = $this->_Refresh->setToken($token)->run();
		$this->assertTrue(is_string($newToken));
	}
}