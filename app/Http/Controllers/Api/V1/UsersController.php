<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    public function notifications($userId)
    {
        $user = User::find($userId);

        return $user->notifications;
    }

    public function deleteNotification($userId, $notificationId) {
        $user = User::find($userId);
        $notification = $user->notifications->where('id', $notificationId)->first();
        $notification->delete();

        return JsonResponse::create('Notification deleted', JsonResponse::HTTP_OK);
    }

    public function deleteNotifications($user) {
        User::find($user)->notifications()->delete();

        return JsonResponse::create('Notifications deleted', JsonResponse::HTTP_OK);
    }
}
