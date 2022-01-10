<?php

declare(strict_types=1);

namespace Tlamy\MacbookSerialDecoder;

class MacSerialInfo
{
    public function __construct(
        public string $model,
        public string $buildDate,
        public string $location
    ) {
    }
}
