<?php

namespace App\Http\Controllers\Contato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContatoController extends Controller
{
    public function lista()
    {
        return '<h1>Informações para Contato</h1>
                <p><strong>Nome:</strong> WSTym</p>
                <p><strong>GitHub:</strong> github.com/WSTym</p>';
    }
}
