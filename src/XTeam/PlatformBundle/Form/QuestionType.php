<?php

namespace XTeam\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, array(
                'attr' => array('class'=> 'materialize-textarea'),
                'label' => 'Titre de la question',
            ))
            ->add('question',TextareaType::class, array(
                'attr' => array('class'=> 'materialize-textarea'),
                'label' => 'Contenu de la question',
            ))
            ->add('tags', 'entity', array(
                'class'    => 'XTeam\PlatformBundle\Entity\Tag',
                'property' => 'tagname',
                'multiple' => true,
                'expanded' => true,
                'attr' => array('class'=> 'filled-in'),
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'XTeam\PlatformBundle\Entity\Question'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'xteam_platformbundle_question';
    }


}
