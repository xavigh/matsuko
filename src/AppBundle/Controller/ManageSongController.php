<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\MusicApp;
use AppBundle\Form\MusicType;


use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextArea;

/**
* @Route("/managesongs")
*/
class ManageSongController extends Controller
{
    /**
     * @Route("/addsong", name="addsong")
     */
    public function manageSongAction(Request $request)
    {
        // if(!is_null($request)){
        //     $reqData = $request->request->all();
        //     var_dump($reqData);
        // }


         $song = new MusicApp();         
         $form = $this->createForm(MusicType::class, $song);
         
         $form->handleRequest($request);
         
         if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $song = $form->getData();
            // $song->setArtistName(" ");
            // $song->setAlbumName(" ");
            // $song->setTrackName(" ");            
            // $song->setDescription(" ");            
            // $song->setUrl(" ");
            // $song->setPictureArtist(" ");
            $song->setCreationDate(new \DateTime());
            // $song->setTopFavorite(" ");
            // $song->setClaveApi(" ");
            // $song->setOuth2Token(" ");
            
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($song);
            $em->flush();
    
            return $this->redirectToRoute('songSelected',array( 'id'=>$song->getId() ));
        }
           
       //if no form submitted to Request then show form to fill in the user  
         return $this->render('manageSongs/newSong.html.twig', array(  'form' => $form->createView()  ));
        

    }
}