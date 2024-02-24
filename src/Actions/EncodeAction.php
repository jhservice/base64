<?php

declare(strict_types=1);

namespace JHService\Base64\Actions;

use JHService\Base64\Exceptions\EncodeException;
use JHService\Singleton\Singleton;
use Throwable;

final class EncodeAction extends Singleton
{
    /**
     * @throws EncodeException
     */
    public function handle(string $string): string
    {
        try {
            $string = trim($string);
            if ($string === '') {
                return '';
            }
            return base64_encode($string);
        } catch (Throwable $throwable) {
            throw new EncodeException($throwable->getMessage(), (int)$throwable->getCode(), $throwable);
        }
    }
}
