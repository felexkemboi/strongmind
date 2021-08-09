<?php

namespace App\Listeners;

use App\Events\ProgramMemberAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProgramMemberAddedEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProgramMemberAdded  $event
     * @return void
     */
    public function handle(ProgramMemberAdded $event)
    {
        $event->program->update(['member_count' => $event->program->member_count + 1]);
    }
}
