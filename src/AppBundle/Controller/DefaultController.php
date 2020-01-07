<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/index.html.twig' );
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

}
