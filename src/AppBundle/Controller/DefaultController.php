<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Dish;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {
        // replace this example code with whatever you need
        $dishesRepo = $this->getDoctrine()->getRepository(Dish::class);
        // finds *all* products
        $dishes = $dishesRepo->findByTop(1);
        //var_dump($dishes);
        return $this->render('frontal/index.html.twig', array('dishes'=>$dishes) );
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/about.html.twig' );
    }

    /**
     * @Route("/carta/{numCarta}", name="carta")
     */
    public function cartaAction(Request $request, $numCarta="show_all")
    {
        // replace this example code with whatever you need
        return $this->render('frontal/carta.html.twig', array('numCarta'=>$numCarta) );
    }

     /**
     * @Route("/menus/{numMenu}", name="menus")
     */
    public function menusAction(Request $request, $numMenu="show_all")
    {
        // replace this example code with whatever you need
        return $this->render('frontal/menus.html.twig', array('numMenu'=>$numMenu) );
    }
   

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/contact.html.twig' );
    }

    /**
     * @Route("/dishItem/{id}", name="dishItem")
     */
    public function dishItemAction(Request $request,$id=null)
    {
        if( $id != null){
             // replace this example code with whatever you need
            $dishesRepo = $this->getDoctrine()->getRepository(Dish::class);
            // finds *all* products
            $dishItem = $dishesRepo->find($id);
            //var_dump($dishes);
            
            return $this->render('frontal/dishItem.html.twig', array('dishItem'=>$dishItem) );

        }else{
            return $this->redirectToRoute('homepage');
        }
       
    }

}
