<?php

namespace Abner\Desis\Controllers;

use eftec\bladeone\BladeOne;

class VoteController
{
    private $view;

    public function __construct()
    {
        $views = __DIR__ . '/../views/votes';
        $compiled = __DIR__ . '/../views/votes/compiled';
        $this->view = new BladeOne($views, $compiled, BladeOne::MODE_DEBUG);
    }

    public function index()
    {
        $message = '¡Index!';
        echo $this->view->run('index', ['message' => $message]);
    }

    public function save()
    {
        var_dump('enviado');
    }
}