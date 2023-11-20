<?php

namespace App\Services\Import;

use App\DTO\ArticleResponseDTO;
use App\Import\FileImport;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;

class ImportService
{
    public function import(UploadedFile $file, int $limit = 140): ArticleResponseDTO
    {
        $responseDto = new ArticleResponseDTO();
        $array = Excel::toArray(new FileImport(), $file)[0];
        uasort($array, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
        $array = array_slice($array, 0, $limit);
        foreach ($array as $article) {
            $responseDto->titleArray[] = $article['title'];
            $responseDto->contentArray[] = $article['body'];
        }
        return $responseDto;
    }
}
