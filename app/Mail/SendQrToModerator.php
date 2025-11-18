<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SendQrToModerator extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public function __construct($event)
    {
        $this->event = $event;
    }

    public function build()
    {
        $event = $this->event;

        // Generiši SVG QR kod
        $qrPng = QrCode::format('png')
            ->size(200)
            ->generate(route('photos.upload.by_token', $event->upload_token));

        return $this->view('emails.send_qr', compact('event', 'qrPng'))
            ->attachData($qrPng, 'qr.png', [
                'as'   => 'qr.png',
                'mime' => 'image/png',
            ]);

    }


}
