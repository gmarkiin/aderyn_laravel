<?php

namespace App\Application\DTO;

use Illuminate\Foundation\Http\FormRequest;

abstract class DTOBase extends FormRequest
{
    abstract protected function isAuthorize(): bool;
    abstract protected function getRules(): array;
    abstract protected function getMessages(): array;
    abstract public function mountObject(): object;

    public function authorize(): bool
    {
        return $this->isAuthorize();
    }

    public function rules(): array
    {
        return $this->getRules();
    }

    public function messages(): array
    {
        return $this->getMessages();
    }
}
