<?php

namespace App\Controller;

use App\Entity\Admin\message;
use App\Entity\Admin\User;
use App\Form\Admin\messageType;
use App\Form\Admin\UserType;
use App\Repository\Admin\CategoryRepository;
use App\Repository\Admin\imageRepository;
use App\Repository\Admin\ProductRepository;
use App\Repository\Admin\SettingsRepository;
use App\Repository\Admin\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index( SettingsRepository $settingsRepository, CategoryRepository $categoryRepository)
    {
        $data = $settingsRepository->findAll();

        $em = $this->getDoctrine()->getManager();
        $sql = " SELECT * FROM product WHERE status = 'True'  ORDER BY ID LIMIT 5";
        $statement = $em->getConnection()->prepare($sql);
        // $statement->bindValue('pid',$parent);
        $statement->execute();
        $sliders = $statement->fetchAll();

        $sql = " SELECT * FROM product WHERE status = 'True'  ORDER BY ID LIMIT 15";
        $statement = $em->getConnection()->prepare($sql);
        // $statement->bindValue('pid',$parent);
        $statement->execute();
        $content = $statement->fetchAll();




        //dump($sliders);
        //  die();
        $cats = $this->categorytree();
        $cats[0] = '<ul class="menu-v">';
        return $this->render('home/index.html.twig', [
            'data' => $data,
            'cats' => $cats,
            'content' => $content,
            'sliders' => $sliders,
        ]);
    }


    public function categorytree($parent = 0, $user_tree_array = '')
    {
        if (!is_array($user_tree_array))
            $user_tree_array = array();

        $em = $this->getDoctrine()->getManager();
        $sql = " SELECT * FROM Category WHERE status = 'True'  AND  parentid  =".$parent;
        $statement = $em->getConnection()->prepare($sql);
        // $statement->bindValue('pid',$parent);
        $statement->execute();
        $result = $statement->fetchAll();
        // print_r($result);
        // die();
        if(count($result)>0)
        {
            $user_tree_array[]="<ul>";
            foreach ($result as $row)
            {
                $user_tree_array[] = "<li> <a href='/category/".$row['id']."'> ". $row['title']."</a>";
                $user_tree_array = $this->categorytree($row['id'],$user_tree_array);

            }
            $user_tree_array[]="</li></ul>";

        }
        return $user_tree_array;
    }




    /**
     * @Route("/category/{catid}", name="category_products", methods="GET")
     */
    public function categoryproducts($catid,CategoryRepository $categoryRepository)
    {     $cats = $this->categorytree();
        $cats[0] = '<ul class="menu-v">';
        $data=$categoryRepository->findBy(
            ['id' =>$catid ]
        );
        $em=$this->getDoctrine()->getManager();
        $sql='SELECT * FROM product WHERE  status="True"AND categoryid = :catid';
        $statement=$em->getConnection()->prepare($sql);
        $statement->bindValue('catid', $catid);
        $statement->execute();
        $products=$statement->fetchAll();

        return $this->render('home/products.html.twig', [
            'data' => $data,
            'products' => $products,
            'cats' => $cats,
        ]);

    }


    /**
     * @Route("/product/{id}", name="product_detail", methods="GET")
     */
    public function productdetail($id,ProductRepository $productRepository,imageRepository $imageRepository)
    {
        $data=$productRepository->findBy(
            ['id' =>$id ]
        );

        $image=$imageRepository->findBy(
            ['product_id' => $id]);
        $cats= $this->categorytree();
        $cats[0]= '<ul id="menu-v">';

        return $this->render('home/productdetail.html.twig', [
            'data' => $data,
            'image' => $image,
            'cats' => $cats,
        ]);

    }


    /**
     * @Route("/hak", name="hak")
     */
    public function hak( SettingsRepository $settingsRepository)
    {
        $data = $settingsRepository->findAll();

        return $this->render('home/hakkımızda.html.twig', [
            'data' => $data,]);
    }


    /**
     * @Route("/referanslar", name="referanslar")
     */
    public function referasnlar( SettingsRepository $settingsRepository)
    {
        $data = $settingsRepository->findAll();

        return $this->render('home/referans.html.twig', [
            'data' => $data,]);
    }


    /**
     * @Route("/iletişim", name="iletişim", methods={"GET","POST"})
     */
    public function iletişim( SettingsRepository $settingsRepository,Request $request)
    {

        $message = new message();
        $form = $this->createForm(messageType::class, $message);
        $form->handleRequest($request);
        $submitedToken=$request->request->get('token');
        if ($form->isSubmitted()) {

            if ($this->isCsrfTokenValid('form-message', $submitedToken))
            {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($message);
                $entityManager->flush();
                $this->addFlash('success','mesaj başarıyla iletildi');

                return $this->redirectToRoute('iletişim');
            }
        }
        $data = $settingsRepository->findAll();

        return $this->render('home/iletişim.html.twig', [
            'data' => $data,
            'form' => $form->createView(),
            'message' => $message,


        ]);
    }





    /**
     * @Route("/newuser", name="new_user", methods={"GET","POST"})
     */
    public function newuser(Request $request,UserRepository $userRepository): Response
    {

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $submitedToken=$request->request->get('token');
        if ($this->isCsrfTokenValid('user-form', $submitedToken)) {

            if ($form->isSubmitted()) {

                $emaildata=$userRepository->findBy(
                    ['email' =>$user->getEmail()]
                );
                if ($emaildata==null){
                $entityManager = $this->getDoctrine()->getManager();
                $user->setRoles("ROLE_USER");
                $entityManager->persist($user);
                $entityManager->flush();
                $this->addFlash('success','Üyelik Kaydınız Başarıyla gerçekleşmiştir.');

                return $this->redirectToRoute('app_login');
                }

                else
                {
                    $this->addFlash('error', $user->getEmail()." email adresi var");
                }
            }
        }
        return $this->render('home/newuser.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }


}
