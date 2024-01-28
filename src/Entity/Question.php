<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    #[Assert\NotBlank]
    private ?string $questionerName = null;

    #[ORM\Column(length: 180)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $questionerEmail = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $body = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionerName(): ?string
    {
        return $this->questionerName;
    }

    public function setQuestionerName(string $questionerName): static
    {
        $this->questionerName = $questionerName;

        return $this;
    }

    public function getQuestionerEmail(): ?string
    {
        return $this->questionerEmail;
    }

    public function setQuestionerEmail(string $questionerEmail): static
    {
        $this->questionerEmail = $questionerEmail;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): static
    {
        $this->body = $body;

        return $this;
    }
}
