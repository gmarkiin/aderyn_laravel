<?php

namespace App\Service;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepositoryInterface;

class UserService
{
    public User $user;
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    public function createUser(): void
    {
        $this->userRepository->create($this->user);
        $this->userRepository->createAuthToken($this->user);
    }
}
