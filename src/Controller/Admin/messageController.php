<?php

namespace App\Controller\Admin;

use App\Entity\Admin\message;
use App\Form\Admin\messageType;
use App\Repository\Admin\messageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/message")
 */
class messageController extends AbstractController
{
    /**
     * @Route("/", name="admin_message_index", methods={"GET"})
     */
    public function index(messageRepository $messageRepository): Response
    {
        return $this->render('admin/message/index.html.twig', [
            'messages' => $messageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_message_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $message = new message();
        $form = $this->createForm(messageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($message);
            $entityManager->flush();

            return $this->redirectToRoute('admin_message_index');
        }

        return $this->render('admin/message/new.html.twig', [
            'message' => $message,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_message_show", methods={"GET"})
     */
    public function show(message $message,$id): Response
    {
        //dump($message);
        //die();

        $em=$this->getDoctrine()->getManager();
        $sql='UPDATE message SET status="okundu" WHERE id=:id';
        $statement=$em->getConnection()->prepare($sql);
        $statement->bindValue('id',$id);
        $statement->execute();


        return $this->render('admin/message/show.html.twig', [
            'message' => $message,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_message_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, message $message): Response
    {
        $form = $this->createForm(messageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_message_index');
        }

        return $this->render('admin/message/edit.html.twig', [
            'message' => $message,
            'form' => $form->createView(),
        ]);
    }




    /**
     * @Route("/{id}/update", name="admin_message_update", methods={"GET","POST"})
     */
    public function messageupdate($id,Request $request, message $message): Response
    {

        $em=$this->getDoctrine()->getManager();
        $sql="UPDATE message SET comment=:comment WHERE id=:id";
        $statement=$em->getConnection()->prepare($sql);

        $statement->bindValue('comment', $request->request->get('comment'));
        $statement->bindValue('id',$id);
        $statement->execute();


        return $this->render('admin/message/show.html.twig', [
            'message' => $message,
            'id' => $id,
        ]);
    }


    /**
     * @Route("/{id}", name="admin_message_delete", methods={"DELETE"})
     */
    public function delete(Request $request, message $message): Response
    {
        if ($this->isCsrfTokenValid('delete'.$message->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($message);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_message_index');
    }
}
