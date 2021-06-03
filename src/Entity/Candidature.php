<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatureRepository::class)
 */
class Candidature
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_Creation;

    /**
     * @ORM\ManyToOne(targetEntity=OffreEmploi::class, inversedBy="candidatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $OffreEmploi;

    /**
     * @ORM\OneToOne(targetEntity=RendezVous::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $Rendez_vous;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="candidatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etatCandidature;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->Date_Creation;
    }

    public function setDateCreation(\DateTimeInterface $Date_Creation): self
    {
        $this->Date_Creation = $Date_Creation;

        return $this;
    }

    public function getEtatCandidature(): ?int
    {
        return $this->etatCandidature;
    }

    public function setEtatCandidature(int $etatCandidature): self
    {
        $this->etatCandidature = $etatCandidature;

        return $this;
    }

    public function getOffreEmploi(): ?OffreEmploi
    {
        return $this->OffreEmploi;
    }

    public function setOffreEmploi(?OffreEmploi $OffreEmploi): self
    {
        $this->OffreEmploi = $OffreEmploi;

        return $this;
    }

    public function getRendezVous(): ?RendezVous
    {
        return $this->Rendez_vous;
    }

    public function setRendezVous(RendezVous $Rendez_vous): self
    {
        $this->Rendez_vous = $Rendez_vous;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
