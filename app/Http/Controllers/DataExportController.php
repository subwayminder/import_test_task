<?php

namespace App\Http\Controllers;

use App\Api\ArticleApi;
use App\Exports\ArticleExport;
use App\Http\Requests\ImportRequest;
use App\Services\Import\ImportService;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DataExportController extends Controller
{
    public function __construct(private readonly ImportService $fileImport)
    {
    }

    public function index(ImportRequest $request): BinaryFileResponse
    {
        $articleDto = $request->file('file')
            ? $this->fileImport->import($request->file('file'))
            : ArticleApi::index(140);
        return Excel::download(
            new ArticleExport(
                $articleDto->titleArray,
                $articleDto->contentArray
            ),
            'articles.xlsx',
            \Maatwebsite\Excel\Excel::XLSX
        );
    }
}
