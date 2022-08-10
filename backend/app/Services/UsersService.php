<?php

namespace App\Services;

use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Hash;

class UsersService
{
    private UsersRepository $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function create($request)
    {
        $user = $request->only(['first_name', 'last_name', 'email', 'password', 'phone']);
        $user['password'] = Hash::make($request->password);

        return $this->usersRepository->create($user);
    }
}
