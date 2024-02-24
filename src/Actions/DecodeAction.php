<?php

declare(strict_types=1);

namespace JHService\Base64\Actions;

use JHService\Base64\Exceptions\DecodeException;
use JHService\Singleton\Singleton;
use Throwable;

final class DecodeAction extends Singleton
{
    /**
     * @throws DecodeException
     */
    public function handle(string $string, bool $strict = false): false|string
    {
        try {
            $string = trim($string);
            if ($string === '') {
                return '';
            }
            return base64_decode($string, $strict);
        } catch (Throwable $throwable) {
            throw new DecodeException($throwable->getMessage(), (int)$throwable->getCode(), $throwable);
        }
    }
}
