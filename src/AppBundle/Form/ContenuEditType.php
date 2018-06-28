<?php

namespace AppBundle\Form;

use AppBundle\Entity\Contenu;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class ContenuEditType extends AbstractType
{


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('info', TextareaType::class, array(
                'label' => "Text",
                'required' => false
            ))
            ->add('sousTitre', TextType::class, array(
                'label' => "Sous Titre",
                'required' => false
            ))
            ->add('imageFile', FileType::class, array(
                'label' => "Image",
                'required' => false
            ))
            ->add('image',HiddenType::class,array(
                'label' => "Sous Titre",
                'required' => false,
            ));
    }

    public function getParent()
    {
        return ContenuType::class;
    }


}
