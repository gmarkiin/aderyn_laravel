<?php

namespace App\Application\Controllers;

use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Application\Requests\UserCreatePost;
use App\Application\Transformers\User\UserApplicationTransformer;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private readonly UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(UserCreatePost $request): JsonResponse
    {
        //TODO Acho que da pra melhorar
        $data = (object)$request->validated();
        $user = UserApplicationTransformer::createUser($data);

        $this->userRepository->create($user);

        return response()->json(['token' => $user->token], Response::HTTP_CREATED);
    }
}
