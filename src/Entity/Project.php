<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $customer = null;

    #[ORM\ManyToMany(targetEntity: Developer::class, mappedBy: 'projects')]
    private Collection $developers;

    public function __construct()
    {
        $this->developers = new Collection();
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

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(?string $customer): static
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get the value of developers
     */
    public function getDevelopers(): Collection
    {
        return $this->developers;
    }

    /**
     * Set the value of developers
     *
     * @return  self
     */
    public function setDevelopers($developers): static
    {
        $this->developers = $developers;

        return $this;
    }
}
