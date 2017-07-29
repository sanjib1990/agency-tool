<?php

namespace App\Listeners;

use App\Jobs\SendRegisteredEmail;
use Illuminate\Auth\Events\Registered as RegisteredEvent;

/**
 * Class Registered
 *
 * @package App\Listeners
 */
class Registered
{
    /**
     * Registered constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param RegisteredEvent $event
     */
    public function handle(RegisteredEvent $event)
    {
        dispatch((new SendRegisteredEmail($event->user))->onQueue("email_registration"));
    }
}
