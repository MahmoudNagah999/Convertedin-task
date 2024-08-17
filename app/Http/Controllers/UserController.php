<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;

class UserController extends Controller
{
    public function searchUsers(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('is_admin', '0')->where('name', 'LIKE', "%{$query}%")
                ->get(['id', 'name']);

        $formattedUsers = [];
        foreach ($users as $user) {
            $formattedUsers[] = ['id' => $user->id, 'text' => $user->name];
        }

        return response()->json($formattedUsers);
    }

    public function searchAdmin(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('is_admin', '1')->where('name', 'LIKE', "%{$query}%")
                ->get(['id', 'name']);

        $formattedUsers = [];
        foreach ($users as $user) {
            $formattedUsers[] = ['id' => $user->id, 'text' => $user->name];
        }

        return response()->json($formattedUsers);
    }

    
}
