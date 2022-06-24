<?php

namespace Antoha\PublicationBundle\Form;


use Antoha\PublicationBundle\Entity\Feedback;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->add('text');
       $builder->add('submit', SubmitType::class, [
           'label' => 'Добавить отзыв'
       ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Feedback::class
        ]);
    }
}