<?php

namespace App\Controller\Userpanel;

use App\Entity\Admin\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserpanelController extends AbstractController
{
    /**
     * @Route("/userpanel", name="userpanel")
     */
    public function index()
    {
        return $this->render('userpanel/show.html.twig');
    }

    /**
     * @Route("/userpanel/edit", name="userpanel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
       $usersession= $this->getUser();
       $user = $this->getDoctrine()
           ->getRepository(User::class)
           ->find($usersession->getid());

        if ($request->isMethod('POST')) {

            $submitedToken = $request->request->get('token');
            if ($this->isCsrfTokenValid('user-form', $submitedToken)) {


                $user->setName($request->request->get("name"));
                $user->setPassword($request->request->get("password"));
                $user->setAdress($request->request->get("adress"));
                $user->setCity($request->request->get("city"));
                $user->setPhone($request->request->get("phone"));
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success','Üyelik bilgileri başarıyla güncelendi...');
                return $this->redirectToRoute('userpanel_show');
            }
        }
        return $this->render('userpanel/edit.html.twig', [
            'user' => $user,
        ]);
    }


    /**
     * @Route("/show", name="userpanel_show", methods={"GET"})
     */
    public function show()
    {
        return $this->render('userpanel/show.html.twig');
    }

}
