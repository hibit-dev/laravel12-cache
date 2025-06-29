<?php

namespace App\Http\Controllers;

use App\Repository\TaggedUserRepositoryInterface;

use Illuminate\Http\JsonResponse;

class TaggedRepositoryController extends Controller
{
    public function get(TaggedUserRepositoryInterface $userRepository): JsonResponse
    {
        $user = $userRepository->getById(1);

        return response()->json($user);
    }
}
