<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiController extends Controller
{
    public function collectionDataResponse($data): \Illuminate\Http\JsonResponse
    {
        try {
            return $this->setItemListResponse($data);
        } catch (NotFoundHttpException $e) {
            return \Illuminate\Support\Facades\Response::json([
                'message' => 'false',
                'data' => $e->getMessage(),
                'code' => $e->getStatusCode(),
            ]);
        }
    }

    public function singleDataResponse($message, $data, $code): \Illuminate\Http\JsonResponse
    {
        try {
            if ($code === 200) {
                return \Illuminate\Support\Facades\Response::json(
                    [
                        'data' => $data,
                        'message' => $message,
                    ],
                    $code);
            }

            return \Illuminate\Support\Facades\Response::json(
                [
                    'data' => $data,
                    'message' => $message,
                ],
                $code);
        } catch (NotFoundHttpException $e) {
            return \Illuminate\Support\Facades\Response::json(
                [
                    'data' => $e->getMessage(),
                    'message' => __('An error has occurred')
                ],
                $e->getStatusCode());
        }
    }

    private function setItemListResponse($data): \Illuminate\Http\JsonResponse
    {
        return \Illuminate\Support\Facades\Response::json([
            'data' => $data->items(),
            'paginate' => [
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ],
            "message" => __(':number records listed correctly', ['number' => $data->total()]),
        ]);
    }
}
