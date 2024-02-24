<?php

declare(strict_types=1);

use JHService\Base64\Actions\DecodeAction;
use JHService\Base64\Actions\EncodeAction;
use JHService\Base64\Actions\UrlDecodeAction;
use JHService\Base64\Actions\UrlEncodeAction;
use JHService\Base64\Exceptions\DecodeException;
use JHService\Base64\Exceptions\EncodeException;
use JHService\Base64\Exceptions\UrlDecodeException;
use JHService\Base64\Exceptions\UrlEncodeException;

if (!function_exists('jhservice_base64_encode')) {
    /**
     * @throws EncodeException
     */
    function jhservice_base64_encode(string $string): string
    {
        return EncodeAction::instance()->handle($string);
    }
}

if (!function_exists('jhservice_base64_decode')) {
    /**
     * @throws DecodeException
     */
    function jhservice_base64_decode(string $string, bool $strict = false): string
    {
        return DecodeAction::instance()->handle($string, $strict);
    }
}

if (!function_exists('jhservice_base64_url_encode')) {
    /**
     * @throws UrlEncodeException
     */
    function jhservice_base64_url_encode(string $string): string
    {
        return UrlEncodeAction::instance()->handle($string);
    }
}

if (!function_exists('jhservice_base64_url_decode')) {
    /**
     * @throws UrlDecodeException
     */
    function jhservice_base64_url_decode(string $string, bool $strict = false): string
    {
        return UrlDecodeAction::instance()->handle($string, $strict);
    }
}
