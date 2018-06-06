<?php

namespace App\DataFixtures;

use App\Entity\Especie;
use App\Entity\Raca;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $especies = [
            'Cachorro' => [
                ['nome' => 'SRD'],
                ['nome' => 'Boxer'],
                ['nome' => 'Shihtzu'],
                ['nome' => 'Poodle'],
            ],
            'Gato' => [
                ['nome' => 'SRD'],
                ['nome' => 'Siamês'],
                ['nome' => 'Angorá'],
            ]
        ];

        foreach ($especies as $especie => $racas) {
            $especieObj = new Especie;
            $especieObj->setNome($especie);
            $manager->persist($especieObj);

            foreach ($racas as $raca) {
                $racaObj = new Raca;
                $racaObj->setEspecie($especieObj);
                $racaObj->setNome($raca['nome']);
                $manager->persist($racaObj);
            }
        }

        $manager->flush();
    }
}
