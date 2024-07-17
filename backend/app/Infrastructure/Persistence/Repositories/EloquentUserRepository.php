<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Transformers\UserTransformer;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function create(User $user): void
    {
        $eloquentUser = UserTransformer::toEloquentModel($user);
        $eloquentUser->save();
        $user->token = $eloquentUser->createToken('apiAuthToken')->plainTextToken;
    }
}
