<?php

namespace App\Form;

use App\Entity\ListeAnimaux;
use App\Entity\ClassCategory;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AnimalAdoptType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Espece')
            ->add('Race')
            ->add('Nom')
            ->add('Sex')
            ->add('Localisation')
            ->add('Age')
            ->add('Photo')
            ->add('Description', TextareaType::class)
            ->add('classCategory', EntityType::class, [
                'class' => ClassCategory::class,
                'choice_label' => 'title',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ListeAnimaux::class,
        ]);
    }
}
