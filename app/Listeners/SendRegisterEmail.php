<?php

namespace App\Listeners;

use App\Mail\RegisterMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendRegisterEmail
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
     * @param   $event
     * @return void
     */
    public function handle($event)
    {
        // 发送短信
        Mail::to('862275679@qq.com')
            ->queue(new RegisterMail($event->data));
    }


}
