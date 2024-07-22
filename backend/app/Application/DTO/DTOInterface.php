<?php

namespace App\Application\DTO;

interface DTOInterface
{
    public function isAuthorize(): bool;
    public function getRules(): array;
    public function getMessages(): array;
    public function mountObject(): object;
}
