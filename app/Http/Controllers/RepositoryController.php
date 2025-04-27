<?php

namespace App\Http\Controllers;

use App\Repository\UserRepositoryInterface;

use Illuminate\Http\JsonResponse;

class RepositoryController extends Controller
{
    public function get(UserRepositoryInterface $userRepository): JsonResponse
    {
        $user = $userRepository->getById(1);

        return response()->json($user);
    }
}
