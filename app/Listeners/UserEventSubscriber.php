<?php

namespace App\Listeners;

use Illuminate\Support\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserEventSubscriber
{
    public function userLogin($event)
    {
        $event->user->shifts()->create(['loggedIn' => Carbon::now()]);
    }

    public function userLogout($event)
    {
        $lastShift = $event->user->shifts()->latest()->first();

        if ($lastShift) {
            $lastShift->update([
                'loggedOut' => Carbon::now(),
                'minutes'   => Carbon::parse($lastShift->loggedIn)->diffInMinutes(Carbon::now())
            ]);
        }
    }

    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@userLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@userLogout'
        );
    }
}
