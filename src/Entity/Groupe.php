<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
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
    private $nbrEtudiant;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $CodeGroupe;

    /**
     * @ORM\OneToMany(targetEntity=Seance::class, mappedBy="groupe")
     */
    private $seances;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="groupe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formation;

    public function __construct()
    {
        $this->seances = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNbrEtudiant(): ?int
    {
        return $this->nbrEtudiant;
    }

    public function setNbrEtudiant(int $nbrEtudiant): self
    {
        $this->nbrEtudiant = $nbrEtudiant;

        return $this;
    }

    public function getCodeGroupe(): ?string
    {
        return $this->CodeGroupe;
    }

    public function setCodeGroupe(string $CodeGroupe): self
    {
        $this->CodeGroupe = $CodeGroupe;

        return $this;
    }


    public function __toString()
    {
        return $this->CodeGroupe;
    }

    /**
     * @return Collection|Seance[]
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances[] = $seance;
            $seance->setGroupe($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getGroupe() === $this) {
                $seance->setGroupe(null);
            }
        }

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }
}
