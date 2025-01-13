<?php

// src/Form/SaisieTauxType.php

// src/Form/SaisieTauxType.php

namespace App\Form;

use App\Entity\SaisieTaux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SaisieTauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder


            ->add('periode', TextType::class)
            ->add('effectif_prev', IntegerType::class, ['required' => false])
            ->add('effectif_inc', IntegerType::class, ['required' => false])
            ->add('effectif_equip', IntegerType::class, ['required' => false])
            ->add('commentaire', TextareaType::class, ['required' => false])
            ->add('non_concerne', IntegerType::class, ['required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SaisieTaux::class,
        ]);
    }
}

