<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
class EmailForQueuing extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user=$user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('mohamadismaeel111-993b2e@inbox.mailtrap.io', 'Mailtrap')
        ->subject('VeryFication Email')
       ->view('mails.email')->with('data',$this->user);
       }
}
