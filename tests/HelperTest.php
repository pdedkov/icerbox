<?php
namespace Icerbox\Tests;

use Icerbox\Helper;

class HelperTest extends \PHPUnit_Framework_TestCase {
	public function testShouldGetIdsFromUrl() {
		$content=<<<EOF
https://icerbox.com/An4ymd1l/mercurial_git.png
https://icerbox.com/ygAAJ2ag
https://icerbox.com/An4ymd1l/mercurial_git.png
https://icerbox.com/folder/mx6PqGkL/tstFolder
https://icerbox.com/folder/O8wJwQxr/tst1
https://icerbox.com/folder/O8wJwQxr/tst1
https://icerbox.com/folder/P8JLXGDY/tst2
                https://icerbox.com/folder/P8JLXGD2/tst3

https://icerbox.com/folder/P8JLXGDY/tstfasdfadfasd
EOF;
		list($folders, $files) = Helper::getContentFromSource($content);
		$this->assertEquals(4, count($folders), 'count folders');
		$this->assertEquals(2, count($files), 'count files');

		list($folders, $files) = Helper::getContentFromSource("https://icerbox.com/An4ymd1l/mercurial_git.png");
		$this->assertEquals([], $folders, 'empty folder');
		$this->assertEquals(['An4ymd1l'], $files, "files");
		list($folders, $files) = Helper::getContentFromSource("https://icerbox.com/folder/mx6PqGkL/tstFolder");
		$this->assertEquals(['mx6PqGkL'], $folders, 'folder');
		$this->assertEquals([], $files, "empty files");

	}

	/**
	 * Test should get file info
	 */
	public function testShouldCheckValidUrl() {
		$this->assertFalse(Helper::isValidUrl("https://www.google.com/"), 'google');
		$this->assertFalse(Helper::isValidUrl("https://icerbox.com/"), 'icerbox');

		$this->assertTrue(Helper::isValidUrl("https://icerbox.com/folder/"), 'icer empty folder');
		$this->assertTrue(Helper::isValidUrl("https://icerbox.com/folder/O8wJwQxr/tst1"), 'folder ok');
		$this->assertTrue(Helper::isValidUrl("https://icerbox.com/An4ymd1l/mercurial_git.png"), 'file ok');
		$this->assertTrue(Helper::isValidUrl("http://icerbox.com/folder/O8wJwQxr/tst1"), 'folder ok http');
		$this->assertTrue(Helper::isValidUrl("http://icerbox.com/An4ymd1l/mercurial_git.png"), 'file ok http');
	}
}