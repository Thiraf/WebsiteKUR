<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RedirectMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $admin;
    public function __construct($admin,$request)
    {
        $this->admin = $admin;
        $this->request = $request;
    }


    // public function build()
    // {
    //     return $this->from('notifikasi.kurdiy@gmail.com','Pengajuan Dana Kur')
    //                 ->view('backend.mail.redirect')
    //                 ->subject('Pengajuan Dana KUR Masuk')
    //                 ->with([
    //                     'admin' => $this->admin,
    //                     'data' => $this->request,
    //                 ]);
    // }
    /**
     * Get the message envelope.
     */

    //  ---------------- BELOM BISA TESTING ----------------

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengajuan Dana KUR Masuk',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'backend.mail.redirect',
            with: [
                'admin' => $this->admin,
                'data' => $this->request
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
