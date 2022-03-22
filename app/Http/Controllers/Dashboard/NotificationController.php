<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $notifications = $user->notifications()->get();

        $notifications->markAsRead();

        return view('dashboard.notifications.index', compact('notifications'));
    }

    public function show($id)
    {
        $user = Auth::user();

        $notification = $user->notifications()->findOrFail($id);

        $notification->markAsRead();

        if ($notification->data['url']) {
            return redirect($notification->data['url']);
        } else {
            return back();
        }
    }
}
