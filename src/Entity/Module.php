<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 */
class Module
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idModule;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libModule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdModule(): ?int
    {
        return $this->idModule;
    }

    public function setIdModule(int $idModule): self
    {
        $this->idModule = $idModule;

        return $this;
    }

    public function getLibModule(): ?string
    {
        return $this->libModule;
    }

    public function setLibModule(string $libModule): self
    {
        $this->libModule = $libModule;

        return $this;
    }
}
