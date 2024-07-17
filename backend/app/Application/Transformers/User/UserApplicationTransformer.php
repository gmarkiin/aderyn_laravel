<?php

namespace App\Application\Transformers\User;

use App\Domain\User\Entities\User;

class UserApplicationTransformer
{
    public static function createUser(object $data): User
    {
        $user = new User();
        $user->name = $data->name;
        $user->username = $data->username;
        $user->email = $data->email;
        $user->password = $data->password;

        return $user;
    }
}
