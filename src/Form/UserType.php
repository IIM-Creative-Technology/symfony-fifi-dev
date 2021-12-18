<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class)
            /*->add('roles', ChoiceType::class, [
                'choices'  => [
                'ROLE_ADMIN' => ["ROLE_ADMIN"],
                'ROLE_SUPER_HERO' => ["ROLE_SUPER_HERO"],
        ]])*/
            //->add('password', TextType::class)
            ->add('intelligence', IntegerType::class)
            ->add('strength', IntegerType::class)
            ->add('speed', IntegerType::class)
            ->add('durability', IntegerType::class)
            ->add('power', IntegerType::class)
            ->add('combat', IntegerType::class)
            ->add('image', TextType::class)
            //->add('missions')
            ->add('submit', SubmitType::class, ['label' =>  'Create'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
