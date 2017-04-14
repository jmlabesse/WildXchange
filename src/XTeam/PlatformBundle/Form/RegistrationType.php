<?php
// src/PlatformBundle/Form/RegistrationType.php

namespace XTeam\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('Profession')
            ->add('Business')
            ->add('Statut')
            ->add('Promo')
            ->add('Git')
            ->add('Twitter')
            ->add('Facebook')
            ->add('LinkedIn')
            ->add('Avatar')
            ;

    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'xteam_user_registration';
    }
}