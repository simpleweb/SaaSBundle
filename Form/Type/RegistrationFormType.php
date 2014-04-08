<?php

namespace Simpleweb\SaaSBundle\Form\Type;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType,
    Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends BaseRegistrationFormType
{
    public function __construct($user_class, $plan_class)
    {
        parent::__construct($user_class);

        $this->plan_class = $plan_class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('plan', 'entity', [
            'class' => $this->plan_class,
            'expanded' => true,
            'mapped' => false
        ]);
    }

    public function getName()
    {
        return 'simpleweb_saas_user_registration';
    }
}
