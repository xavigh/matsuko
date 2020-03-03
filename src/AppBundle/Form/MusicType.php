<?php
// src/AppBundle/Form/MusicType.php
namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;



class MusicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artistName', TextType::class)
            ->add('albumName', TextType::class)
            ->add('trackName', TextType::class)
            ->add('url', TextType::class, array('label' => 'youtube video code, ex. 1DWiB7ZuLvI'))
           
            ->add('category', EntityType::class, array('class' => 'AppBundle:Category'))      
            ->add('topFavorite')            
            ->add('description', TextareaType::class)           
            ->add('save', SubmitType::class, array('label' => 'new track'))
            ;     
           
    }
}