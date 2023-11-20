<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ArticleExport implements FromArray
{
    protected array $titleRow;
    protected array $bodyRow;

    public function __construct(array $titleRow, array $bodyRow)
    {
        $this->titleRow = $titleRow;
        $this->bodyRow = $bodyRow;
    }

    public function array(): array
    {
        return [
            $this->titleRow,
            $this->bodyRow
        ];
    }
}
