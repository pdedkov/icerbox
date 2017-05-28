<?php
namespace Icerbox\Tests\Api;

use Icerbox\Api;

class FilesTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @var \Icerbox\Api\Files
	 */
	protected $_Files = null;

	/**
	 * Test files id
	 * @var array
	 */
	protected $_testFilesId = ['pO97jKGl'];

	public function setUp() {
		parent::setUp();
		$this->_Files = new Api\Files();
	}

	/**
	 * Test should get file info
	 */
	public function testShouldGetFileInfo() {
		$this->assertEquals(
			$this->_testFilesId[0],
			$this->_Files->run(['query' => ['ids' => $this->_testFilesId]])[0]['id']
		);
	}
}