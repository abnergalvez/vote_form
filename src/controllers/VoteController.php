<?php

namespace Desis\Controllers;

use eftec\bladeone\BladeOne;
use Desis\Repositories\CandidateRepository;
use Desis\Repositories\RegionRepository;
use Desis\Models\Vote;
use Desis\Repositories\VoteRepository;

class VoteController
{
    private $view;

    public function __construct()
    {
        $views = __DIR__ . '/../views/votes';
        $compiled = __DIR__ . '/../views/compiled';
        $this->view = new BladeOne($views, $compiled, BladeOne::MODE_DEBUG);
    }

    public function index()
    {
        $candidateRepository = new CandidateRepository;
        $regionRepository = new RegionRepository;
        $regions = $regionRepository->getAll();
        $candidatesVotes = $candidateRepository->getAllWithVotes();
        $appName = $_ENV['APP_NAME'];
        echo $this->view->run('index', [
            'app' => $appName,
            'candidatesVotes' => $candidatesVotes,
            'regions' => $regions,
            'title' => 'Formulario de Votación',
            'description' => 'Todos los campos son obligatorios excepto "Alias"'
        ]);


    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vote = new Vote(
                0,
                $_POST['fullname'],
                $_POST['alias'],
                $_POST['rut'],
                $_POST['email'],
                $_POST['region'],
                $_POST['commune'],
                $_POST['candidate'],
                json_encode($_POST['find_out'])
            );
            $voteRepository = new VoteRepository;
            $existRut = $voteRepository->rutExists($vote->rut);
            if($existRut){
                echo json_encode(['status' => 'error', 'message' => 'Al parecer ya haz votado con tu rut , no es posible registrar el voto!']);
                return; 
            }
            $voteRepository->save($vote);
            echo json_encode(['status' => 'success', 'message' => 'Voto guardado con exito']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Requerimiento Invalido']);
        }
    }
}