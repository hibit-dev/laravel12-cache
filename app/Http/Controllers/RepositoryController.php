<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RepositoryController extends Controller
{
    public function store(): JsonResponse
    {
        return response(null, Response::HTTP_CREATED)->json();
    }

    public function get(): JsonResponse
    {
        $data = [];

        return response()->json($data);
    }
}
