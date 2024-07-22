<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user): void;

    public function createAuthToken(User $user): void;
}
