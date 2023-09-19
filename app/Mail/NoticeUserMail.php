<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoticeUserMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'New Inquiry For Room';
        return $this->from('mangaletamang65@gmail.com', 'Nepal Bed & Breakfast')
        ->subject($subject)
        ->markdown('mails.noticeuser')
        ->with([
            'details' => $details ]);
    }
}
