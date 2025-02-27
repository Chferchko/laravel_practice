<?php

declare(strict_types=1);

namespace App\Infrastructure\Dto;

use Illuminate\Support\Str;

abstract class AbstractDto
{
    public static function fromArray(array $attributes): static
    {
        $instance = new static();

        foreach ($attributes as $key => $value) {
            $setterMethod = sprintf('set%s', Str::studly($key));

            if (method_exists($instance, $setterMethod)) {
                $instance->{$setterMethod}($value);
            }
        }

        return $instance;
    }
}
