<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->type == 'admin') {
            $postsCount = Post::all()->count();
            $postsInactive = Post::where('status','inactive')->count();
            $usersCount = User::all()->count();
            $userNeedAprove = User::where('type', 'user')->count();

            return view('dashboard.index', compact(['postsCount', 'postsInactive', 'usersCount', 'userNeedAprove']));
        } else {
            $postsCount = Auth::user()->posts->count();
            $postsInactive = Auth::user()->posts()->where('status','inactive')->count();

            return view('dashboard.index', compact(['postsCount', 'postsInactive']));
        }
    }
}
