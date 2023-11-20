<?php

namespace App\Api;

use App\DTO\ArticleResponseDTO;
use Illuminate\Support\Facades\Http;

class ArticleApi
{
    public static function index(int $limit, string $orderBy = 'date', string $order = 'desc'): ArticleResponseDTO
    {
        $responseDto = new ArticleResponseDTO();
        for ($i = 1; $i <= ceil($limit / 100); $i++) {
            $apiLimit = $i * 100 <= $limit ? 100 : $limit % 100;
            if ($limit < 100) {
                $apiLimit = $limit;
            }
            $apiResponse = Http::get('https://techcrunch.com/wp-json/wp/v2/posts', [
                'per_page' => $apiLimit,
                'page' => $i,
                'order' => $order,
                'orderby' => $orderBy,
            ])->body();
            $apiResponse = json_decode($apiResponse, true);
            if (!count($apiResponse)) {
                break;
            }
            foreach ($apiResponse as $article) {
                $responseDto->titleArray[] = $article['title']['rendered'];
                $responseDto->contentArray[] = $article['content']['rendered'];
            }
        }
        return $responseDto;
    }
}
