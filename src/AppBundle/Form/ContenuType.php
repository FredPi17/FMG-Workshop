<?php

namespace AppBundle\Form;

use AppBundle\Entity\Contenu;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class ContenuType extends AbstractType
{

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $checker;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(TokenStorageInterface $tokenStorage, AuthorizationCheckerInterface $checker, EntityManagerInterface $em)
    {
        $this->tokenStorage = $tokenStorage;
        $this->checker = $checker;
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('info', TextareaType::class, array(
                'label' => "Text"
            ))
            ->add('sousTitre', TextType::class, array(
                'label' => "Sous Titre"
            ))
            ->add('imageFile', FileType::class, array(
                'label' => "Image"
            ));

        $builder
            ->addEventListener(
                FormEvents::POST_SUBMIT, array($this, 'onPreSubmit')
            );
    }

    public function onPreSubmit(FormEvent $event){
        /** @var Contenu $contenu */
        $contenu = $event->getData();
        $cours = $event->getForm()->getParent()->getParent()->getViewData();
        $contenu->setCours($cours);

        if($contenu->getInfo() != null) {
            $contenu->setType("Text");
        }
        else if($contenu->getSousTitre() != null){
            $contenu->setType("SousTitre");
        }
        else if($contenu->getImageFile() != null){
            $contenu->setType("Image");
        }


    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contenu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contenu';
    }


}
