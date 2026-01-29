<?php

namespace App\Mail;

use App\Models\Compra;
use App\Models\Evento;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompraConfirmada extends Mailable
{
    use Queueable, SerializesModels;

    public Compra $compra;
    public Evento $evento;

    public function __construct(Compra $compra, Evento $evento)
    {
        $this->compra = $compra;
        $this->evento = $evento;
    }

    public function build()
    {
        return $this->subject('Confirmación de compra - ' . $this->evento->titulo)
            ->view('emails.compra_confirmada');
    }
}
