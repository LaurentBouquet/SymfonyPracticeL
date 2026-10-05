<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\Question;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text')

            // ->add('is_correct')
            // On rend le champ is_correct facultatif (null si pas coché)
            ->add('is_correct', CheckboxType::class, ['required' => false])

            // On n'affiche pas la question lors de l'affichage d'une réponse
            // ->add('question', EntityType::class, [
            //     'class' => Question::class,
            //     'choice_label' => 'id',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Answer::class,
        ]);
    }
}
