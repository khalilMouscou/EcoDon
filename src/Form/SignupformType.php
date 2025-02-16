<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignupformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Full Name',
                'attr' => ['placeholder' => 'Enter your full name']
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email Address',
                'attr' => ['placeholder' => 'Enter your email']
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Password',
                'attr' => ['placeholder' => 'Enter a strong password']
            ])
            ->add('tel', TextType::class, [
                'label' => 'Phone Number',
                'attr' => ['placeholder' => 'Enter your phone number']
            ])
            ->add('address', TextType::class, [
                'label' => 'Address',
                'attr' => ['placeholder' => 'Enter your address']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
