<?php

namespace Abner\Desis\Controllers;

class VoteController
{
    public function __construct()
    {
    }

    public function index()
    {
        echo  "Bienvenido al formulario principal.";
    }

    public function enviar()
    {
        echo "El formulario ha sido enviado correctamente.";
    }
}