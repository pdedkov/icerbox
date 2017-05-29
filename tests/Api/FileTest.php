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

	protected $_testInvalid = 'invalidFileId';

	public function setUp() {
		parent::setUp();
		$this->_File = new Api\File();
	}

	/**
	 * @expectedException \Icerbox\Api\Exception
	 */
	public function testShouldGetInvalidFile() {
		$this->_File->run(['id' => $this->_testInvalid]);
	}

	/**
	 * Test should get file info
	 */
	public function testShouldGetFileInfo() {
		$this->assertEquals($this->_testFileId, $this->_File->run(['id' => $this->_testFileId])['id']);
	}
}