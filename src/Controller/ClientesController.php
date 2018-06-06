<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\ClienteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @param Request $request
     * @Route("clientes/create", name="clientes_create")
     * @Template("clientes/create.html.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function create(Request $request)
    {
        $cliente = new Cliente;
        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cliente);
            $entityManager->flush();

            $this->addFlash('success', 'Cliente cadastrado com sucesso!');

            return $this->redirectToRoute('clientes_index');
        }

        return [
            'form' => $form->createView()
        ];
    }
}
