<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Models\EloquentUser;
use App\Infrastructure\Persistence\Transformers\UserTransformer;

readonly class EloquentUserRepository implements UserRepositoryInterface
{
    private EloquentUser $eloquent;
    private UserTransformer $userTransformer;

    public function __construct()
    {
        $this->eloquent = new EloquentUser();
        $this->userTransformer = new UserTransformer($this->eloquent);
    }

    public function create(User $user): void
    {
        $this->userTransformer->toEloquentModel($user);
        $this->eloquent->save();
    }

    public function createAuthToken(User $user): void
    {
        $user->token = $this->eloquent->createToken('apiAuthToken')->plainTextToken;
    }
}
