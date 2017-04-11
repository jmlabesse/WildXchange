<?php

namespace XTeam\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class userType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')->add('nom')->add('prenom')->add('password')->add('email')->add('profession')->add('business')->add('statut')->add('promo')->add('git')->add('twitter')->add('facebook')->add('linkedin')->add('avatar');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'XTeam\PlatformBundle\Entity\user'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'xteam_platformbundle_user';
    }


}
