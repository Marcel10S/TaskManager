<?php

namespace App\Entity;

use Symfony\Component\Uid\Uuid;
use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "string", unique: true)]
    private ?Uuid $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Day $day = null;

    public function __construct(string $name, string $status, string $type, Day $day)
    {
        $this->id = Uuid::v4();
        $this->name = $name;
        $this->status = $status;
        $this->type = $type;
        $this->day = $day;
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function updateName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function updateStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function updateType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDay(): ?Day
    {
        return $this->day;
    }

    public function updateDay(?Day $day): self
    {
        $this->day = $day;

        return $this;
    }
}
