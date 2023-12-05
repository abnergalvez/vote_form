<?php

namespace Desis\Models;

class Region
{
    public int $id;
    public string $label;
    public string $tag;
    public string $short;

    public function __construct(int $id, string $label, string $tag, string $short)
    {
        $this->id = $id;
        $this->label = $label;
        $this->tag = $tag;
        $this->short = $short;
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
}