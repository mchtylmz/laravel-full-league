<?php

namespace App\Repositories\Admin\Tool;

use App\Http\Resources\Admin\Tools\FileResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Pharaonic\Laravel\Uploader\Upload;

class FileRepository
{
    /**
     * @param Request $request
     * @return array
     */
    public function table(Request $request): array
    {
        $uploads = Upload::latest();

        if ($search = $request->get('search')) {
            $uploads->where('name', 'LIKE', '%' . $search . '%');
        }

        $count = $uploads->count();

        if ($offset = $request->get('offset')) {
            $uploads->offset($offset);
        }
        if ($limit = $request->get('limit')) {
            $uploads->limit($limit);
        }

        $data = FileResource::collection($uploads->get());
        return [
            'rows' => $data,
            'total' => $count,
            'totalNotFiltered' => $count
        ];
    }
}
