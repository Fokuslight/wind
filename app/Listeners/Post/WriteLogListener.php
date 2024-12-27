<?php

namespace App\Listeners\Post;

use App\Events\Post\StoredPostEvent;

class WriteLogListener
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
    public function handle(StoredPostEvent $event): void
    {
        dump(111111111111111);
    }
}
