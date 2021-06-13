<?php

namespace App\Controller;

use App\Entity\Candidature;
use App\Form\Candidature1Type;
use App\Repository\CandidatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/recruteur/candidature/rec")
 */
class CandidatureRecController extends AbstractController
{
    /**
     * @Route("/", name="candidature_rec_index", methods={"GET"})
     */
    public function index(CandidatureRepository $candidatureRepository): Response
    {
        return $this->render('candidature_rec/index.html.twig', [
            'candidatures' => $candidatureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="candidature_rec_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $candidature = new Candidature();
        $form = $this->createForm(Candidature1Type::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidature);
            $entityManager->flush();

            return $this->redirectToRoute('candidature_rec_index');
        }

        return $this->render('candidature_rec/new.html.twig', [
            'candidature' => $candidature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidature_rec_show", methods={"GET"})
     */
    public function show(Candidature $candidature): Response
    {
        return $this->render('candidature_rec/show.html.twig', [
            'candidature' => $candidature,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="candidature_rec_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Candidature $candidature): Response
    {
        $form = $this->createForm(Candidature1Type::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $candidature->setEtatCandidature(2);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidature_rec_index');
        }

        return $this->render('candidature_rec/edit.html.twig', [
            'candidature' => $candidature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="candidature_rec_Refuser", methods={"GET","POST"})
     */
    public function Refuser(Request $request, Candidature $candidature): Response
    {

            $candidature->setEtatCandidature(5);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('candidature_rec_index');

    }

    /**
     * @Route("/", name="SupprimerRV", methods={"GET","POST"})
     */
    public function SupprimerRV(Request $request, Candidature $candidature): Response
    {

            $candidature->setNull();
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('candidature_rec_index');

    }




    /**
     * @Route("/{id}", name="candidature_rec_delete", methods={"POST"})
     */
    public function delete(Request $request, Candidature $candidature): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidature->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($candidature);
            $entityManager->flush();
        }

        return $this->redirectToRoute('candidature_rec_index');
    }
}
