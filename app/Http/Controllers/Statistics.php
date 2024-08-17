<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Statistics extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $topUsers = User::select('users.id', 'users.name', DB::raw('COUNT(tasks.id) as task_count'))
            ->leftJoin('tasks', function ($join) {
            $join->on('users.id', '=', 'tasks.assigned_to_id')
            ->orOn('users.id', '=', 'tasks.assigned_by_id');
        })
        ->groupBy('users.id', 'users.name')
        ->orderByDesc('task_count')
        ->limit(10)
        ->get();

        return view('statistics',[
            'topUsers' => $topUsers
        ]);
    }
}
