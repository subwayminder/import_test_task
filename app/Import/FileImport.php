<?php

namespace App\Import;

use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FileImport implements WithHeadingRow, WithValidation
{
    use Importable;
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'body' => 'required|string',
            'created_at' => 'required|date',
        ];
    }
}
