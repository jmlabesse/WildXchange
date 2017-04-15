<?php

namespace XTeam\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('label' => 'form.lastname', 'translation_domain' => 'FOSUserBundle'))
                ->add('prenom', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('label' => 'form.firstname', 'translation_domain' => 'FOSUserBundle'));
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