<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Transformers\UserTransformer;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function create(User $user): void
    {
        UserTransformer::toEloquentModel($user);
        $user->persistence->save();
    }

    public function createAuthToken(User $user): void
    {
        $user->token = $user->persistence->createToken('apiAuthToken')->plainTextToken;
    }
}
