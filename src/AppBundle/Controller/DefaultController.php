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
     * @Route("/{page}", name="homepage")
     */
    public function homeAction(Request $request, $page = 1)
    {
        // replace this example code with whatever you need
        $musicRepo = $this->getDoctrine()->getRepository(MusicApp::class);
        // finds *all* products
       // $songs = $musicRepo->findByTop(1);
 
        $numMaxSongs = 3;
        // createQueryBuilder() automatically selects FROM AppBundle:Product
        // and aliases it to "p"
        $query = $musicRepo->createQueryBuilder('s')
        ->where('s.topFavorite = 1')
        ->setFirstResult($numMaxSongs * ($page-1))
        ->setMaxResults($numMaxSongs)
        ->getQuery();
        $songs = $query->getResult();
    
        return $this->render('frontal/index.html.twig', array( 'songs'=>$songs, 'numMaxSongs'=>$numMaxSongs, 'currentPage'=>$page) );
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
