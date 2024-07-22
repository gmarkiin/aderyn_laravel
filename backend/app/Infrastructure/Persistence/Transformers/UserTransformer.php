<?php

namespace App\Infrastructure\Persistence\Transformers;

use App\Domain\User\Entities\User;
use App\Infrastructure\Persistence\Models\EloquentUser;

class UserTransformer
{
    public static function toEloquentModel(User $user): void
    {
        $eloquentUser = new EloquentUser();
        $eloquentUser->name = $user->name;
        $eloquentUser->username = $user->username;
        $eloquentUser->email = $user->email;
        $eloquentUser->password = $user->password;

        $user->persistence = $eloquentUser;
    }
}
