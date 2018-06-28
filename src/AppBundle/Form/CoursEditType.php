<?php

namespace AppBundle\Form;

use AppBundle\Entity\Category;
use AppBundle\Entity\Contenu;
use AppBundle\Repository\CategoryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => "Titre"
            ))
            ->add('introduction', TextareaType::class, array(
                'label' => "Introduction"
            ))
            ->add('imageFile', FileType::class, array(
                'label' => "Sticker Image",
                'required' => false
            ))
            ->add('category', EntityType::class, array(
                "class" => Category::class,
                'label' => "Categorie",
                'placeholder' => "Selectionnez une valeur",
                'choice_label' => 'name',
                'query_builder' => function (CategoryRepository $categoryRepository) {
                    return $categoryRepository->findCategoryQueryBuilder();
                }
            ))
            ->add('contenu', CollectionType::class, array(
                    'entry_type' => ContenuEditType::class,
                    'allow_add' => true,
                    'allow_delete' => true)
            );
    }

    public function getParent()
    {
        return CoursType::class;
    }
}
