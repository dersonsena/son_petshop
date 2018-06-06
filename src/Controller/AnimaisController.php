<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\AnimalType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnimaisController extends Controller
{
    /**
     * @Route("/animais", name="animais_index")
     * @Template("animais/index.html.twig")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $animais = $entityManager->getRepository(Animal::class)->findAll();

        return [
            'animais' => $animais
        ];
    }

    /**
     * @Route("animais/view/{id}", name="animais_view")
     * @Template("animais/view.html.twig")
     */
    public function view(Animal $animal)
    {
        return [
            'animal' => $animal
        ];
    }

    /**
     * @param Request $request
     * @Route("animais/create", name="animais_create")
     * @Template("animais/create.html.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function create(Request $request)
    {
        $animal = new Animal;
        $form = $this->createForm(AnimalType::class, $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($animal);
            $entityManager->flush();

            $this->addFlash('success', 'Animal cadastrado com sucesso!');

            return $this->redirectToRoute('animais_index');
        }

        return [
            'form' => $form->createView()
        ];
    }
}
