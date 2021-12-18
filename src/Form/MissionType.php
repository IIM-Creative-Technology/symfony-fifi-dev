<?php

namespace App\Form;

use App\Entity\Mission;
//use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('priority', ChoiceType::class, [
                'choices'  => [
                    'low' => 'low',
                    'medium' => 'medium',
                    'high' => 'high',

                ]])
            ->add('execute_date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    'low' => 'low',
                    'medium' => 'medium',
                    'high' => 'high',

                ]])
            /*->add('users', EntityType::class, [
                'label' => "Super heroes",
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) {
                $query = $er->CreateQueryBuilder('r');
              //  if ($options['status'] > 0) {
                    $query->where('r.status = :status')->setParameter('status', 1);
               // }
                return $query;
                },
                'choice_label' => 'username',
                "placeholder" => 'Select',
                'multiple' => true,
               // 'mapped'=> false,
                'constraints' => array(
                    new \Symfony\Component\Validator\Constraints\Count(['min' => 1, 'minMessage' => 'Please select an hero to execute the mission'])
                )



                ])*/
            ->add('submit', SubmitType::class, ['label' =>  'Create'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}
