<?php
namespace Icerbox\Tests\Api\Download;

use Icerbox\Api\Download\Ticket;
use Icerbox\Api\Auth\Login;

class TicketTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @var \Icerbox\Api\Download\Ticket
	 */
	protected $_Ticket = null;

	public function setUp() {
		parent::setUp();
		$this->_Ticket = new Ticket();
	}

	/**
	 * Test should download file  from API
	 */
	public function testShouldDownloadFile() {
		if (!file_exists(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config.php')) {
			$this->markTestSkipped("Please configure");
		}
		$config = require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config.php';

		$Login = new Login();
		$token = $Login->run($config);

		$url = $this->_Ticket->setToken($token)->run(['file' => $config['file']]);
		$this->assertEquals(
			"http://s10.icerbox.com/d/7AyLk7/pO97jKGl/tjegWu4Mm9V2QGFMKG1I9Fb3Gainrb8S/arQXPr1713029fix.rar",
			$url
		);
	}
}