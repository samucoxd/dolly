<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 */
class Producto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sabor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $relleno;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="productos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity=Reservaproducto::class, mappedBy="producto", orphanRemoval=true)
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getSabor(): ?string
    {
        return $this->sabor;
    }

    public function setSabor(string $sabor): self
    {
        $this->sabor = $sabor;

        return $this;
    }

    public function getRelleno(): ?string
    {
        return $this->relleno;
    }

    public function setRelleno(string $relleno): self
    {
        $this->relleno = $relleno;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

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
            $reservaproducto->setProducto($this);
        }

        return $this;
    }

    public function removeReservaproducto(Reservaproducto $reservaproducto): self
    {
        if ($this->reservaproductos->contains($reservaproducto)) {
            $this->reservaproductos->removeElement($reservaproducto);
            // set the owning side to null (unless already changed)
            if ($reservaproducto->getProducto() === $this) {
                $reservaproducto->setProducto(null);
            }
        }

        return $this;
    }
}
