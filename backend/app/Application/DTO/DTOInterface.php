<?php

namespace App\Application\DTO;

interface DTOInterface
{
    public function authorize(): bool;
    public function rules(): array;
    public function messages(): array;
    public function mountObject(): object;
}
