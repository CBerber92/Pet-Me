<?php

namespace App\Controller;

use App\Entity\ListeAnimaux;
use App\Repository\ListeAnimauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(ListeAnimauxRepository $repo)
    {
        $animaux = $repo->findAll();

        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
            'animaux' => $animaux
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('search/home.html.twig');
    }

    /**
     * @Route("/search/{id}", name="show")
     */
    public function show($id){
        $repo=$this->getDoctrine()->getRepository(ListeAnimaux::class);

        $animal = $repo->find($id);

        return $this->render('search/show.html.twig', [
            'animal' => $animal
        ]);
    }
}
