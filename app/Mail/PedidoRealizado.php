<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PedidoRealizado extends Mailable
{
    use Queueable, SerializesModels;


    public $pedido;
    /**
     * Create a new message instance.
     */
    public function __construct($pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pedido Realizado -EAP Store',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->markdown('mail.pedidos.realizado-plain', [
            'url' => route('orders.show', $this->pedido),
            'pedido' => $this->pedido
        ]);
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
