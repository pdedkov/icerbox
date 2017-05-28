<?php
namespace Icerbox\Tests\Api;

use Icerbox\Api;

class FileTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @var \Icerbox\Api\File
	 */
	protected $_File = null;

	/**
	 * Test file id
	 * @var string
	 */
	protected $_testFileId = 'pO97jKGl';

	public function setUp() {
		parent::setUp();
		$this->_File = new Api\File();
	}

	/**
	 * Test should get file info
	 */
	public function testShouldGetFileInfo() {
		$this->assertEquals($this->_testFileId, $this->_File->run(['query' => ['id' => $this->_testFileId]])['id']);
	}
}