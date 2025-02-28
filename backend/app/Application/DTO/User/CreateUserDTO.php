<?php

namespace App\Application\DTO\User;

use App\Application\DTO\DTOInterface;
use App\Domain\User\Entities\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserDTO extends FormRequest implements DTOInterface
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
       return [
           'name' => 'required|min:3|string',
           'username' => 'required|min:3|string|unique:users',
           'email' => 'required|email|unique:users',
           'password' => 'required',
       ];
    }

    public function messages(): array
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
