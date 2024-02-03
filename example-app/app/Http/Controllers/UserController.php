<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserDomicilio;

class UserController extends Controller
{
    public function getAllUsersWithDomicilios()
    {
        $usersWithDomicilios = User::with('domicilio')->get();

        $usersWithDomicilios = $usersWithDomicilios->map(function ($user) {
            $user->edad = $this->calculateAge($user->fecha_nacimiento);
            return $user;
        });

        return response()->json($usersWithDomicilios, 200);
    }

    private function calculateAge($fechaNacimiento)
    {
        return Carbon::parse($fechaNacimiento)->age;
    }
}
