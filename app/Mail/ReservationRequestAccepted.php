<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationRequestaccepted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $reservation;
    public $subject;
    public $pdf;

    public function __construct($reservation, $subject, $pdf)
    {
        $this->reservation = $reservation;
        $this->subject = $subject;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->attachData($this->pdf, "ticket.pdf")->markdown('emails.reservation-request-accepted')->with('reservation');
    }
}
