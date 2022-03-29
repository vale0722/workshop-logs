<?php

namespace App\Responses;

class ItemResponse
{
    protected ?string $name = '';
    protected ?string $description = '';
    protected ?string $urlImage = '';

    public function __construct(?string $name, ?string $description, ?string $urlImage)
    {
        $this->name = $name;
        $this->description = $description;
        $this->urlImage = $urlImage;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }
}
