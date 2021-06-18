<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OffreEmploiRepository;


/**
 * @Route("/", name="home", methods={"GET"})
*/
class HomeController extends AbstractController
{

    public function index(OffreEmploiRepository $offreEmploiRepository) : Response
    {   
        return $this->render('home/index.html.twig', [
            'offre_emplois' => $offreEmploiRepository->findAll(),
        ]);
    }

    /**
     * @Route("/recruteur/Acceuil", name="Acceuil", methods={"GET","POST"})
     */
    public function Acceuil()
    {
        return $this->render('home/Acceuil.html.twig');
    }
}