<?php

namespace Desis\Models;

class Commune
{
    public int $id;
    public string $label;
    public string $tag;
    public string $short;
    public int $province_id;

    public function __construct(int $id, string $label, string $tag, string $short,int $province_id)
    {
        $this->id = $id;
        $this->label = $label;
        $this->tag = $tag;
        $this->short = $short;
        $this->province_id = $province_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getShort(): string
    {
        return $this->short;
    }

    public function getProvinceId(): string
    {
        return $this->province_id;
    }
}