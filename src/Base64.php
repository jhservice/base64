<?php

declare(strict_types=1);

namespace JHService\Base64;

use JHService\Base64\Actions\DecodeAction;
use JHService\Base64\Actions\EncodeAction;
use JHService\Base64\Actions\UrlDecodeAction;
use JHService\Base64\Actions\UrlEncodeAction;
use JHService\Base64\Exceptions\DecodeException;
use JHService\Base64\Exceptions\EncodeException;
use JHService\Base64\Exceptions\UrlDecodeException;
use JHService\Base64\Exceptions\UrlEncodeException;
use JHService\Singleton\Singleton;

final class Base64 extends Singleton
{
    /**
     * @throws EncodeException
     */
    public function encode(string $string): string
    {
        return EncodeAction::instance()->handle($string);
    }

    /**
     * @throws DecodeException
     */
    public function decode(string $string, bool $strict = false): false|string
    {
        return DecodeAction::instance()->handle($string, $strict);
    }

    /**
     * @throws UrlEncodeException
     */
    public function url_encode(string $string): string
    {
        return UrlEncodeAction::instance()->handle($string);
    }

    /**
     * @throws UrlDecodeException
     */
    public function url_decode(string $string, bool $strict = false): string
    {
        return UrlDecodeAction::instance()->handle($string, $strict);
    }
}
