<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimalRepository")
 */
class Animal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     */
    private $nome;

    /**
     * @var string
     * @ORM\Column(type="date")
     */
    private $data_nascimento;

    /**
     * @var object
     * @ORM\ManyToMany(targetEntity="App\Entity\Cliente", mappedBy="animal")
     */
    private $cliente;

    /**
     * @var object
     * @ORM\ManyToOne(targetEntity="App\Entity\Raca", inversedBy="id")
     */
    private $raca;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Animal
     */
    public function setNome(string $nome): Animal
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataNascimento(): string
    {
        return $this->data_nascimento;
    }

    /**
     * @param string $data_nascimento
     * @return Animal
     */
    public function setDataNascimento(string $data_nascimento): Animal
    {
        $this->data_nascimento = $data_nascimento;
        return $this;
    }

    /**
     * @return object
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param object $cliente
     * @return Animal
     */
    public function setCliente($cliente): Animal
    {
        $this->cliente = $cliente;
        return $this;
    }

    /**
     * @return object
     */
    public function getRaca()
    {
        return $this->raca;
    }

    /**
     * @param object $raca
     * @return Animal
     */
    public function setRaca($raca): Animal
    {
        $this->raca = $raca;
        return $this;
    }
}
