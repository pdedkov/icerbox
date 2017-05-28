<?php
namespace Icerbox\Tests\Api;

use Icerbox\Api;

class FolderTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @var \Icerbox\Api\Folder
	 */
	protected $_Folder = null;

	/**
	 * Test file id
	 * @var string
	 */
	protected $_testFolderId = 'pxB7zB8q';
	protected $_testFolderName = 'iN1705DevDri';

	public function setUp() {
		parent::setUp();
		$this->_Folder = new Api\Folder();
	}

	/**
	 * Test should get file info
	 */
	public function testShouldGetFileInfo() {
		$this->assertEquals(
			$this->_testFolderName,
			$this->_Folder->run(['query' => ['id' => $this->_testFolderId]])['name']
		);
	}
}