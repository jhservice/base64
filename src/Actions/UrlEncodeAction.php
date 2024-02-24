<?php

declare(strict_types=1);

namespace JHService\Base64\Actions;

use JHService\Base64\Exceptions\UrlEncodeException;
use JHService\Singleton\Singleton;
use Throwable;

final class UrlEncodeAction extends Singleton
{
    /**
     * @throws UrlEncodeException
     */
    public function handle(string $string): string
    {
        try {
            $string = trim($string);
            if ($string === '') {
                return '';
            }
            $string = base64_encode($string);
            $string = strtr($string, '+/', '-_');
            return rtrim($string, '=');
        } catch (Throwable $throwable) {
            throw new UrlEncodeException($throwable->getMessage(), (int)$throwable->getCode(), $throwable);
        }
    }
}
