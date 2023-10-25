<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class StudentType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add(
        'name',
        TextType::class,
        [
          'label' => 'Nombre'
        ]
      )
      ->add(
        'email',
        EmailType::class,
        [
          'label' => 'Email'
        ]
      )
      ->add(
        'address',
        TextType::class,
        [
          'label' => 'Dirección'
        ]
      )
      ->add(
        'payment',
        NumberType::class,
        [
          'label' => 'Cuenta bancaria',
          'data' => '0000000000000000'
        ]
      )
      ->add(
        'schedule',
        TextType::class,
        [
          'label' => 'Horario'
        ]
      )
      ->add(
        'comments',
        TextType::class,
        [
          'label' => 'Comentarios'
        ]
      )
      ->add(
        'surname',
        TextType::class,
        [
          'label' => 'Apellidos'
        ]
      )
      ->add(
        'birth_date',
        DateType::class,
        [
          'label' => 'Fecha de nacimiento'
        ]
      )
      ->add(
        'dni',
        TextType::class,
        [
          'label' => 'DNI'
        ]
      )
      ->add(
        'phone',

        TelType::class,
        [
          'label' => 'Teléfono',
          'data' => '+34 000 000 000',
          'required' => true,
        ]
      )
      ->add(
        'has_image_rights_accepted',
        ChoiceType::class,
        [
          'required' => true,
          'label' => 'Derechos de imagen',
          'choices' => [
            'Sí' => true,
            'No' => false,
          ],
          'expanded' => true,
          'multiple' => false,
          'data' => true,
        ]
      )
      ->add('has_sepa_agreement_accepted')
      // ->add('created_at')
      // ->add('updated_at')
      // ->add('removed_at')
      ->add('enabled')
      ->add(
        'tariff',
        EntityType::class,
        [
          'class' => 'App\Entity\Tariff',
          'choice_label' => 'name',
          'multiple' => false,
        ]
      )
      ->add(
        'bank',
        EntityType::class,
        [
          'class' => 'App\Entity\Bank',
          'choice_label' => 'name',
          'multiple' => false,
        ]
      )
      ->add(
        'events',
        EntityType::class,
        [
          'class' => 'App\Entity\Event',
          'choice_label' => 'name',
          'multiple' => true,
        ]
        )
      ->add(
        'city',
        EntityType::class,
        [
          'class' => 'App\Entity\City',
          'choice_label' => 'name',
          'multiple' => false,
        ]
        )
      ->add(
        'parent',
        EntityType::class,
        [
          'class' => 'App\Entity\Person',
          'choice_label' => 'name',
          'multiple' => false,
        ]
      );
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Student::class,
    ]);
  }
}
