<?php

namespace Desis\Models;

class Vote
{
    public int $id;
    public string $fullname;
    public string $alias;
    public string $rut;
    public string $email;
    public int $region_id;
    public int $commune_id;
    public int $candidate_id;
    public string $find_out;

    public function __construct(
        int $id, 
        string $fullname,
        string $alias = NULL,
        string $rut,
        string $email,
        int $region_id,
        int $commune_id,
        int $candidate_id,
        string $find_out,
        )
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->alias = $alias;
        $this->rut = $rut;
        $this->email = $email;
        $this->region_id = $region_id;
        $this->commune_id = $commune_id;
        $this->candidate_id = $candidate_id;
        $this->find_out = $find_out;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFullName(): string
    {
        return $this->fullname;
    }
}
