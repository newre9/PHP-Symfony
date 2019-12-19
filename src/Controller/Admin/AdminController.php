<?php

namespace App\Controller\Admin;

use App\Entity\Orders;
use App\Repository\OrderdetailRepository;
use App\Repository\OrdersRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * @Route("/orders/show/{id}", name="admin_orders_show", methods="GET")
     */
    public function show($id, Orders $orders, OrderdetailRepository $orderdetailRepository):Response
    {
        $orderdetail=$orderdetailRepository->findBy(
            ['orderid' => $id]
        );
        return $this->render('admin/orders/show.html.twig', [
            'orderdetail' => $orderdetail,
            'order' => $orders,

        ]);
    }


    /**
     * @Route("/admin/orders/{slug}", name="admin_orders_index")
     */
    public function orders($slug, OrdersRepository $ordersRepository)
    {
        $orders=$ordersRepository->findBy(
            ['status' => $slug]
        );
        return $this->render('admin/orders/index.html.twig', [
            'orders' => $orders,
        ]);
    }

    /**
     * @Route("/admin/orders/{id}/update", name="admin_orders_update", methods="POST")
     */
    public function orderupdate($id, Request $request, Orders $orders): Response
    {



    $em = $this->getDoctrine()->getManager();
    $sql="UPDATE orders SET shipinfo=:shipinfo, note=:note, status=:status WHERE id=:id";
    $statement = $em->getConnection()->prepare($sql);
    $statement->bindValue('shipinfo', $request->request->get('shipinfo'));
    $statement->bindValue('note', $request->request->get('note'));
    $statement->bindValue('status', $request->request->get('status'));
    $statement->bindValue('note', $request->request->get('note'));
    $statement->bindValue('id', $id);
    $statement->execute();
    $this->addFlash('succeces', 'Spariş bilgileri güncellernmiştir.');
        return $this->redirectToRoute('admin_orders_show', array('id' => $id));

    }



}
