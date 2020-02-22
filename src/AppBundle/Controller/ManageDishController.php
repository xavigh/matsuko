<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Dish;
use AppBundle\Form\DishType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
* @Route("/managedish")
*/
class ManageDishController extends Controller
{
    /**
     * @Route("/newdish", name="newdish")
     */
    public function ManageDishAction(Request $request)
    {
         $dish = new Dish();         
         $form = $this->createForm(DishType::class, $dish);
           
         return $this->render('manageDishes/newDish.html.twig', array(  'form' => $form->createView()  ));

    }
}