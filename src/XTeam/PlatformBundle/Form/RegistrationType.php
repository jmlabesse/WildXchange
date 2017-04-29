<?php

namespace XTeam\PlatformBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('email')->remove('username')->remove('plainPassword');

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
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
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
                'required' => true,
                ))
            ->add('avatar', FileType::class, array(
                'label' => 'Avatar',
                'required' => false,
                'attr' => array('class' => 'validate'),
                ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
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
