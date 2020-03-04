<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\MusicApp;
use AppBundle\Entity\Category;

class DefaultController extends Controller
{
    /**
     * @Route("/{pageNum}", name="homepage")
     */
    public function homeAction(Request $request, $pageNum = 1)
    {
        //constant value of numMaxSongs
        $numMaxSongs = 3; 
        

        // replace this example code with whatever you need
        $musicRepo = $this->getDoctrine()->getRepository(MusicApp::class);
                     
        // calling the repository function pageSongs to get the songs elements per page to do pagination
        $songs = $musicRepo->paginationElements($pageNum);

        return $this->render('frontal/index.html.twig', array( 'songs'=>$songs, 'numMaxSongs'=>$numMaxSongs, 'currentPage'=>$pageNum) );
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
     * @Route("/home/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/contact.html.twig' );
    }

    /**
     * @Route("/songSelected/{id}", name="songSelected")
     */
    public function songSelectedAction(Request $request,$id=null)
    {
        if( $id != null){
             // replace this example code with whatever you need
            $songsRepo = $this->getDoctrine()->getRepository(MusicApp::class);
            // finds *all* products
            $songId = $songsRepo->find($id);
            // var_dump($songId);
           
            return $this->render( 'frontal/songSelected.html.twig', array('song'=>$songId ) );
            

        }else{
            return $this->redirectToRoute('homepage');
        }

    }

        
    /**
     * @Route("/categorySelected/{id}", name="categorySelected")
     */
    public function categorySelectedAction(Request $request,$id=null)
    {
        if( $id != null){
             // replace this example code with whatever you need
            $categoryRepo = $this->getDoctrine()->getRepository(Category::class);
            // finds *all* products
            $categoryId = $categoryRepo->find($id);
            // var_dump($songId);
           
            return $this->render( 'frontal/categorySelected.html.twig', array('category'=>$categoryId ) );
            

        }else{
            
            return $this->redirectToRoute('homepage');
        }
    }


}
