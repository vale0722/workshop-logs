<?php

namespace App\Responses;

class ItemApiResponse
{
    protected string $id;
    protected string $name;
    protected string $description;
    protected string $image;

    public function __construct(string $id, string $name, string $description, string $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImage(): string
    {
        return $this->image;
    }
}
