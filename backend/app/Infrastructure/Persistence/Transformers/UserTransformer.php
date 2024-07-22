<?php

namespace App\Infrastructure\Persistence\Transformers;

use App\Domain\User\Entities\User;
use App\Infrastructure\Persistence\Models\EloquentUser;

readonly class UserTransformer
{
    public function __construct(private EloquentUser $eloquent)
    {
    }

    public function toEloquentModel(User $user): void
    {
        $this->eloquent->name = $user->name;
        $this->eloquent->username = $user->username;
        $this->eloquent->email = $user->email;
        $this->eloquent->password = $user->password;
    }
}
