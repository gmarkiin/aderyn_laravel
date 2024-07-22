<?php

namespace App\Application\DTO\User;

use App\Application\DTO\DTOBase;
use App\Domain\User\Entities\User;

class CreateUserDTO extends DTOBase
{
    protected function isAuthorize(): bool
    {
        return true;
    }

    protected function getRules(): array
    {
       return [
           'name' => 'required|min:3|string',
           'username' => 'required|min:3|string|unique:users',
           'email' => 'required|email|unique:users',
           'password' => 'required',
       ];
    }

    protected function getMessages(): array
    {
        return [
            'name.min' => 'O nome precisa ter pelo menos 3 caracteres',
            'name.required' => 'O nome é obrigatório',
            'username.required' => 'O nome de usuário é obrigatório',
            'email.required' => 'O e-mail é obrigatório',
            'password.required' => 'A senha é obrigatória',
            'username.unique' => 'O nome de usuário já está sendo utilizado',
            'email.unique' => 'O e-mail já está sendo utilizado',
            'email.email' => 'O e-mail é inválido'
        ];
    }

    public function mountObject(): User
    {
        $data = (object)$this->validated();

        $user = new User();
        $user->name = $data->name;
        $user->username = $data->username;
        $user->email = $data->email;
        $user->password = $data->password;

        return $user;
    }
}
