<?php

declare(strict_types=1);

namespace App\Feature\Post\Dto;

use App\Infrastructure\Dto\AbstractDto;

final class CreatePostDto extends AbstractDto
{
    private string $title;
    private string $content;
    private string $description;
    private ?string $image;

    public function __construct(
    ) {
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;
        
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }
}
