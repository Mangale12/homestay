<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoticeAdminMail extends Mailable
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
        // dd($this->details);
        $subject = 'New Inquiry For Room';
        return $this->from('book@nepalbedandbreakfast.com', 'Nepal Bed & Breakfast')
        ->subject($subject)
        ->markdown('email.noticeadmin')
        ->with(['details' => $this->details ]);
    }
}
