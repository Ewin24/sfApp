<?php

namespace App\DataFixtures;

use App\Entity\AreaContacto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Factory\CursoFactory;
use App\Factory\ContactoFactory;
use App\Factory\AreaContactoFactory;
use App\Factory\EstudianteFactory;
use App\Factory\EvaluacionFactory;
use App\Factory\PreguntaFactory;
use App\Factory\TipoPreguntaFactory;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CursoFactory::createMany(20);
        EstudianteFactory::createMany(20);
        EvaluacionFactory::createMany(20);
        PreguntaFactory::createMany(20);
        TipoPreguntaFactory::createMany(20);
        AreaContactoFactory::createMany(20);
        ContactoFactory::createMany(20);

        // $product = new Product();
        
        // $manager->persist($product);

        $manager->flush();
    }
}
