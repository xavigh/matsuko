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
         $form->handleRequest($request);
         
         if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $dish = $form->getData();
            $dish->setIngredients(" ");
            $dish->setPicture(" ");
            $dish->setCreationDate(new \DateTime());
            $dish->setTop(0);
    
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($dish);
            $em->flush();
    
            return $this->redirectToRoute('dishItem',array('id'=>$dish->getId()));
        }
           
       //if no form submitted to Request then show form to fill in the user  
         return $this->render('manageDishes/newDish.html.twig', array(  'form' => $form->createView()  ));

    }
}