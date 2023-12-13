<?php

namespace App\Listeners;

use IlluminateNotificationsEventsNotificationFailed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFailedNotifications
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(IlluminateNotificationsEventsNotificationFailed $event): void
    {
        //
    }
}
