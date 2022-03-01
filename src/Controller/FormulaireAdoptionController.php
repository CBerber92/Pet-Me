<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\ListeAnimaux;
use App\Form\AnimalAdoptType;

class FormulaireAdoptionController extends AbstractController
{
    /**
     * @Route("/form", name="formulaire_adoption")
     */
    public function form(Request $request, EntityManagerInterface $manager)
    {
        $animal = new ListeAnimaux();

        $form = $this->createForm(AnimalAdoptType::class, $animal);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $animal->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($animal);
            $manager->flush();

            return $this->redirectToRoute('search');
        }

        return $this->render('formulaire_adoption/index.html.twig', [
            'formAnimal' => $form->createView()
        ]);
    }
}
