<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function update(Request $request, $id)
    {


        if( User::find($id)!=Auth::user()){
            return response()->json(['status' => 'you do not have permission to update profile of the other users '], Response::HTTP_NOT_FOUND);
        }

        $user = Auth::user();
        if (!$user) {
            return response()->json(['status' => 'user not found'], Response::HTTP_NOT_FOUND);
        }
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();

        return $user;
    }
}
