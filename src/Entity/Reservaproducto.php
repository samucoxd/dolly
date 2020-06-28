<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservaproductoRepository::class)
 */
class Reservaproducto
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
    private $fechaentrega;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $obs;

    /**
     * @ORM\ManyToOne(targetEntity=Reserva::class, inversedBy="reservaproductos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reserva;

    /**
     * @ORM\ManyToOne(targetEntity=Producto::class, inversedBy="reservaproductos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $producto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaentrega(): ?\DateTimeInterface
    {
        return $this->fechaentrega;
    }

    public function setFechaentrega(\DateTimeInterface $fechaentrega): self
    {
        $this->fechaentrega = $fechaentrega;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }

    public function getReserva(): ?Reserva
    {
        return $this->reserva;
    }

    public function setReserva(?Reserva $reserva): self
    {
        $this->reserva = $reserva;

        return $this;
    }

    public function getProducto(): ?Producto
    {
        return $this->producto;
    }

    public function setProducto(?Producto $producto): self
    {
        $this->producto = $producto;

        return $this;
    }
}
