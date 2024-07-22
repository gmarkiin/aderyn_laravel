<?php

namespace App\Domain\User\Entities;

use App\Infrastructure\Persistence\Models\EloquentUser;

class User
{
    public string $name;
    public string $username;
    public string $email;
    public string $password;
    public string $token;
    public EloquentUser $persistence;
}
