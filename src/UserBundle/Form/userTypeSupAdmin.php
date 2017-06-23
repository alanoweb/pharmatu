<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class userTypeSupAdmin extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('roles', 'collection', array('type' => 'choice','label' => 'Role','allow_add' => true,'allow_delete' => true,
                   'options' => array(
                       'label' => false, /* Ajoutez cette ligne */
                       'choices' => array(
                           
                           'ROLE_ADMIN' => 'Admin',
                           'ROLE_USER'=>'Utilisateur',
                           'ROLE_Entreprise'=>'Entreprise'
                       )
                   )
               )
         );
       
        
    }
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\user'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
     public function getName()
    {
        return $this->getBlockPrefix();
    }


}
