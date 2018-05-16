<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LibroRepository")
 */
class Libro
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $edicion;

    /**
     * @ORM\Column(type="integer")
     */
    private $numpaginas;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Autor", inversedBy="libros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $autor;

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getEdicion(): ?string
    {
        return $this->edicion;
    }

    public function setEdicion(string $edicion): self
    {
        $this->edicion = $edicion;

        return $this;
    }

    public function getNumpaginas(): ?int
    {
        return $this->numpaginas;
    }

    public function setNumpaginas(int $numpaginas): self
    {
        $this->numpaginas = $numpaginas;

        return $this;
    }

    public function getAutor(): ?Autor
    {
        return $this->autor;
    }

    public function setAutor(?Autor $autor): self
    {
        $this->autor = $autor;

        return $this;
    }
}
