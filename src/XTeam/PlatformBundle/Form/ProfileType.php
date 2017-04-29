<?php

namespace XTeam\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('current_password');
        $builder
            ->add('email', EmailType::class, array(
                'label' => 'Email',
                'attr' => array('class' => 'validate'),
            ))
            ->add('username', TextType::class, array(
                'label' => 'Nom d\'utilisateur',
                'attr' => array('class' => 'validate'),
            ))
            ->add('nom', TextType::class, array(
                'label' => 'Nom',
                'attr' => array('class' => 'validate'),
            ))
            ->add('prenom', TextType::class, array(
                'label' => 'Prénom',
                'attr' => array('class' => 'validate'),
            ))
            ->add('statut', ChoiceType::class, array(
                'label' => 'Statut',
                'choices' => array(
                    'Wilder' => 'Wilder',
                    'Ancien Wilder' => 'Ancien Wilder',
                    'Staff' => 'Staff'),
                'expanded' => true,
                'multiple' => false,
                'attr' => array('class' => 'validate'),
            ))
            ->add('profession', TextType::class, array(
                'label' => 'Profession',
                'required' => false,
                'attr' => array('class' => 'validate work_info'),
            ))
            ->add('business', TextType::class, array(
                'label' => 'Société',
                'required' => false,
                'attr' => array('class' => 'validate work_info'),
            ))
            ->add('promo', TextType::class, array(
                'label' => 'Promotion WCS',
                'attr' => array('class' => 'validate'),
            ))
            ->add('git', TextType::class, array(
                'label' => 'Compte Github',
                'required' => false,
                'attr' => array('class' => 'validate'),
            ))
            ->add('twitter', TextType::class, array(
                'label' => 'Compte Twitter',
                'required' => false,
                'attr' => array('class' => 'validate'),
            ))
            ->add('facebook', TextType::class, array(
                'label' => 'Compte Facebook',
                'required' => false,
                'attr' => array('class' => 'validate'),
            ))
            ->add('linkedin', TextType::class, array(
                'label' => 'URL du compte Linkedin',
                'required' => false,
                'attr' => array('class' => 'validate'),
            ))
            ->add('technos', 'entity', array(
                'class'    => 'XTeam\PlatformBundle\Entity\Techno',
                'property' => 'nom',
                'multiple' => true,
                'expanded' => true,
                'attr' => array('class'=> 'filled-in'),
            ))
            ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}