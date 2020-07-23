<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmailExames extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $nomePaciente;
    protected $email;
    protected $exame;
   

    public function __construct($nomePaciente, $email, $exame)
    {
        $this->nomePaciente = $nomePaciente;
        $this->email = $email;
        $this->exame = $exame;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $this->nomePaciente->nome;
        $this->email->email;
        $this->exame[0]->nome;
        $this->subject('Clínica Viver Mais - Resultado de Exame');
        $this->to($this->email->email,$this->nomePaciente->nome);
        return $this->view('consulta.componentes.emailResultadoExame',[
            'nome' => $this->nomePaciente->nome,
            'exame' =>  $this->exame[0]->nome,
        ]);
    }
}
