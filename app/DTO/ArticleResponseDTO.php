<?php

namespace App\DTO;

use phpDocumentor\Reflection\Types\String_;
use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Data;

class ArticleResponseDTO extends Data
{
    #[ArrayType(String_::class)]
    public array $titleArray;
    #[ArrayType(String_::class)]
    public array $contentArray;
}
