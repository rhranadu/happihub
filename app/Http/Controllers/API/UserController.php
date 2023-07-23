<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'division' => 'required|string',
        ]);
        $user = User::create($validatedData);
        return response()->json(['user' => $user], 201);
    }
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }
    public function show(User $user)
    {

        return response()->json(['user' => $user], 200);
    }
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:6',
            'division' => 'sometimes|string',
        ]);
        $user->update($validatedData);
        return response()->json(['user' => $user], 200);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
