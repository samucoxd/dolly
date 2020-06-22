<?php

namespace App\Controller;

use App\Entity\Reservaproducto;
use App\Form\ReservaproductoType;
use App\Repository\ReservaproductoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reservaproducto")
 */
class ReservaproductoController extends AbstractController
{
    /**
     * @Route("/", name="reservaproducto_index", methods={"GET"})
     */
    public function index(ReservaproductoRepository $reservaproductoRepository): Response
    {
        return $this->render('reservaproducto/index.html.twig', [
            'reservaproductos' => $reservaproductoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reservaproducto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reservaproducto = new Reservaproducto();
        $form = $this->createForm(ReservaproductoType::class, $reservaproducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservaproducto);
            $entityManager->flush();

            return $this->redirectToRoute('reservaproducto_index');
        }

        return $this->render('reservaproducto/new.html.twig', [
            'reservaproducto' => $reservaproducto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservaproducto_show", methods={"GET"})
     */
    public function show(Reservaproducto $reservaproducto): Response
    {
        return $this->render('reservaproducto/show.html.twig', [
            'reservaproducto' => $reservaproducto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reservaproducto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reservaproducto $reservaproducto): Response
    {
        $form = $this->createForm(ReservaproductoType::class, $reservaproducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservaproducto_index');
        }

        return $this->render('reservaproducto/edit.html.twig', [
            'reservaproducto' => $reservaproducto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservaproducto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Reservaproducto $reservaproducto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservaproducto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reservaproducto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reservaproducto_index');
    }
}
