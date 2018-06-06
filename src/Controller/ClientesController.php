<?php

namespace App\Controller;

use App\Entity\Cliente;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientesController extends Controller
{
    /**
     * @Route("/clientes", name="clientes_index")
     * @Template("clientes/index.html.twig")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $clientes = $entityManager->getRepository(Cliente::class)->findAll();

        return [
            'clientes' => $clientes
        ];
    }

    /**
     * @Route("clientes/view/{id}", name="clientes_view")
     * @Template("clientes/view.html.twig")
     */
    public function view(Cliente $cliente)
    {
        return [
            'cliente' => $cliente
        ];
    }
}
