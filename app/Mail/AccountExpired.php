<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Settings;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Accountexpired extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param $userId
     */
    public function __construct($userId)
    {
        $this->user = User::find($userId);
    }

    /**
     * Build the message.
     *
     * @return $this
     * @throws \Exception
     */
    public function build()
    {
        return $this->from(Settings::settingValue('site.main.email'))->subject('Account expired')->view('emails.accountExpired')->with(['account' => $this->user->role->name, 'username' => $this->user->username, 'site' => Settings::settingValue('site.main.title')]);
    }
}
