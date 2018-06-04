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
}

