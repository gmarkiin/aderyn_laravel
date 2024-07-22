<?php

namespace App\Application\Controllers;

use App\Application\DTO\User\CreateUserDTO;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function create(CreateUserDTO $request): JsonResponse
    {
        //TODO Acho que da pra melhorar
        $user = $request->mountObject();

        $this->userService->user = $user;
        $this->userService->createUser();

        return response()->json(['token' => $user->token], Response::HTTP_CREATED);
    }
}
