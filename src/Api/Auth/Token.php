<?php
namespace Icerbox\Api\Auth;

use Icerbox\Api\Base;
use Icerbox\Api\Exception as BaseException;

/**
 * Class Token
 * @package Icerbox\Api\Auth
 */
class Token {
    /**
     * @param $path
     * @param $lifetime
     * @param $email
     * @param $password
     * @return string token
     */
    public function run($path, $lifetime, $email, $password) {
        // get token from file
        if (file_exists($path)) {
            $token = file_get_contents($path);
            $lastModifiedTime = filemtime($path);
            if ($lastModifiedTime === false || ($lastModifiedTime + $lifetime * 60) <= time()) {
                // логинимся
                $token = (new Refresh())->setToken($token)->run();
                file_put_contents($path, $token);
            }
        } else {
            $token = (new Login())->run(['email' => $email, 'password' => $password]);
            file_put_contents($path, $token);
        }

        return $token;
    }
}
