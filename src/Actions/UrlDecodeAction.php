<?php

declare(strict_types=1);

namespace JHService\Base64\Actions;

use JHService\Base64\Exceptions\UrlDecodeException;
use JHService\Singleton\Singleton;
use Throwable;

final class UrlDecodeAction extends Singleton
{
    /**
     * @throws UrlDecodeException
     */
    public function handle(string $string, bool $strict = false): string
    {
        try {
            $string = trim($string);
            if ($string === '') {
                return '';
            }
            $string = str_pad($string, strlen($string) % 4, '=', STR_PAD_RIGHT);
            $string = strtr($string, '-_', '+/');
            return base64_decode($string, $strict);
        } catch (Throwable $throwable) {
            throw new UrlDecodeException($throwable->getMessage(), (int)$throwable->getCode(), $throwable);
        }
    }
}
