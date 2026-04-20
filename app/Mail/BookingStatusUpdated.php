<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Create a new message instance.
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Booking Status Updated')
                    ->view('mail.booking_status')
                    ->with([
                        'name' => $this->booking->name,
                        'status' => $this->booking->status,
                        'bookingDate' => $this->booking->booking_date,
                        'bookingTime' => $this->booking->booking_time,
                    ]);
    }
}
