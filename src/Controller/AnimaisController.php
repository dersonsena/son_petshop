<?php

namespace App\Controller;

use App\Entity\Animal;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
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
}
