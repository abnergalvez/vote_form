<?php

namespace Desis\Controllers;

use Desis\Repositories\RegionRepository;


class RegionController
{
   
    public function __construct()
    {
        
    }

    public function getcommunes()
    {
        $region_id = $_POST['region_id'];
        $regionRepository = new RegionRepository();
        $communes = $regionRepository->getCommunesByRegion($region_id);
        echo json_encode($communes);
    }

}