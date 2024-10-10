<?php

namespace App\Entity;

use App\Enums\PositionEnum;
use App\Repository\DeveloperRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: DeveloperRepository::class)]
class Developer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    private ?string $phone = null;

    #[ORM\Column(type: "string", enumType: PositionEnum::class)]
    private PositionEnum $position;

    #[ORM\ManyToMany(targetEntity: Project::class, inversedBy: 'developers')]
    #[ORM\JoinTable(name: 'developers_projects')]
    private Collection $projects;

    public function __construct()
    {
        $this->projects = new Collection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of position
     */
    public function getPosition(): PositionEnum
    {
        return $this->position;
    }

    /**
     * Set the value of position
     *
     * @return  self
     */
    public function setPosition($position): static
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the value of projects
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    /**
     * Set the value of projects
     *
     * @return  self
     */
    public function setProjects($projects): static
    {
        $this->projects = $projects;

        return $this;
    }
}
