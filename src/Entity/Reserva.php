<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservaRepository::class)
 */
class Reserva
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="reservas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Reservaproducto::class, mappedBy="reserva", orphanRemoval=true)
     */
    private $reservaproductos;

    public function __construct()
    {
        $this->reservaproductos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

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

    /**
     * @return Collection|Reservaproducto[]
     */
    public function getReservaproductos(): Collection
    {
        return $this->reservaproductos;
    }

    public function addReservaproducto(Reservaproducto $reservaproducto): self
    {
        if (!$this->reservaproductos->contains($reservaproducto)) {
            $this->reservaproductos[] = $reservaproducto;
            $reservaproducto->setReserva($this);
        }

        return $this;
    }

    public function removeReservaproducto(Reservaproducto $reservaproducto): self
    {
        if ($this->reservaproductos->contains($reservaproducto)) {
            $this->reservaproductos->removeElement($reservaproducto);
            // set the owning side to null (unless already changed)
            if ($reservaproducto->getReserva() === $this) {
                $reservaproducto->setReserva(null);
            }
        }

        return $this;
    }
}
