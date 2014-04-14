<?php

namespace Simpleweb\SaaSBundle\Form\Type;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType,
    Symfony\Component\Form;

class RegistrationFormType extends BaseRegistrationFormType
{
    protected $plan_class;

    protected $session;

    public function __construct($user_class, $plan_class, $session)
    {
        parent::__construct($user_class);

        $this->plan_class = $plan_class;
        $this->session = $session;
    }

    public function buildForm(Form\FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('plan', 'entity', [
                'class' => $this->plan_class,
                'expanded' => true,
                'mapped' => false
            ])
            ->add('referrer', 'simpleweb_saas_referrer')
        ;

        $builder->addEventListener(Form\FormEvents::POST_SET_DATA, function (Form\FormEvent $event) {
            $event->getForm()->get('referrer')->setData($this->session->get('referrer'));
        });
    }

    public function getName()
    {
        return 'simpleweb_saas_user_registration';
    }
}
