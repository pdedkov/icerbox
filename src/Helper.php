<?php
namespace icerbox;

class Helper {
	/**
	 * in source url folder regexp
	 */
	const FOLDER_REGEX = "#https?://icerbox.com/folder/.+#";

	/**
	 * check if url is valid icerbox download url
	 */
	const VALID_DL_URL = "#^https?://icerbox.com/(folder/)?.+#";

	/**
	 * get resource id regexp
	 */
	const ID_REGEXP = "#^https?://icerbox.com/(folder/)?([\w\d]+)/?(.*)$#";

	/**
	 * Detect valid icebox dl url
	 * @param string $url url to check
	 * @return bool
	 */
	public static function isValidUrl($url) {
		return (bool)preg_match(self::VALID_DL_URL, $url);
	}

	/**
	 * Get IDs from urls in src
	 * @param string $src string with urls
	 * @return array array of files and folders ids
	 */
	public static function getContentFromSource($src) {
		$lines = explode(PHP_EOL, $src);
		$folders = $files = [];

		foreach($lines as $line) {
			if (preg_match(self::ID_REGEXP, trim($line), $matches)) {
				if (empty($matches[2])) {
					continue;
				}
				// check is it folder
				if (empty($matches[1])) {
					$files[] = $matches[2];
				} else {
					$folders[] = $matches[2];
				}
			}
		}

		return [array_unique($folders), array_unique($files)];
	}
}