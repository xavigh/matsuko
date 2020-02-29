<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\MusicApp;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {
        // replace this example code with whatever you need
        $musicRepo = $this->getDoctrine()->getRepository(MusicApp::class);
        // finds *all* products
        $songs = $musicRepo->findAll();
        //var_dump($songs);
        return $this->render('frontal/index.html.twig', array('songs'=>$songs) );
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
     * @Route("/playlist/{numPlayList}", name="playlist" )
     */
    public function playlistAction(Request $request, $numPlayList="show_all")
    {
        // replace this example code with whatever you need
        return $this->render('frontal/playlist.html.twig', array('numPlayList'=>$numPlayList) );
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
