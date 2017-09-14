<?php

namespace App\Repositories;

use App\Traits\RepositoryTrait;
use App\User;

class UserRepository
{
    use RepositoryTrait;

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
