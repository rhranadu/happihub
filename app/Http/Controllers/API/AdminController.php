<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function filterUsersByEmailAndDivision(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'sometimes|email',
            'division' => 'sometimes|string',
        ]);
        $users = User::query();
        if ($request->has('email')) {

            $users->where('email', 'LIKE', '%' . $validatedData['email'] . '%');
        }
        if ($request->has('division')) {
            $users->where('division', $validatedData['division']);
        }
        $users = $users->get();
        return response()->json(['users' => $users], 200);
    }
}
