<?php

namespace App\Controller;

use App\Entity\Orderdetail;
use App\Form\OrderdetailType;
use App\Repository\OrderdetailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/orderdetail")
 */
class OrderdetailController extends AbstractController
{
    /**
     * @Route("/", name="orderdetail_index", methods={"GET"})
     */
    public function index(OrderdetailRepository $orderdetailRepository): Response
    {
        return $this->render('orderdetail/index.html.twig', [
            'orderdetails' => $orderdetailRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="orderdetail_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $orderdetail = new Orderdetail();
        $form = $this->createForm(OrderdetailType::class, $orderdetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($orderdetail);
            $entityManager->flush();

            return $this->redirectToRoute('orderdetail_index');
        }

        return $this->render('orderdetail/new.html.twig', [
            'orderdetail' => $orderdetail,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="orderdetail_show", methods={"GET"})
     */
    public function show(Orderdetail $orderdetail): Response
    {
        return $this->render('orderdetail/show.html.twig', [
            'orderdetail' => $orderdetail,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="orderdetail_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Orderdetail $orderdetail): Response
    {
        $form = $this->createForm(OrderdetailType::class, $orderdetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('orderdetail_index');
        }

        return $this->render('orderdetail/edit.html.twig', [
            'orderdetail' => $orderdetail,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="orderdetail_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Orderdetail $orderdetail): Response
    {
        if ($this->isCsrfTokenValid('delete'.$orderdetail->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($orderdetail);
            $entityManager->flush();
        }

        return $this->redirectToRoute('orderdetail_index');
    }
}
