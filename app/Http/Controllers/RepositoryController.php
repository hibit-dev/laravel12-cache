<?php

namespace App\Http\Controllers;

use App\Repository\UserRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RepositoryController extends Controller
{
    public function store(): JsonResponse
    {
        return response(null, Response::HTTP_CREATED)->json();
    }

    public function get(UserRepositoryInterface $userRepository): JsonResponse
    {
        $user = $userRepository->getById(1);

        return response()->json($user);
    }
}
