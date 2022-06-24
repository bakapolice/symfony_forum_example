<?php
/**
 * Created by PhpStorm.
 * User: Vsrat
 * Date: 12/22/2018
 * Time: 11:49 PM
 */

namespace Antoha\PublicationBundle\Form;


use Antoha\PublicationBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageDeleteForm extends AbstractType
{
    public function buildDeleteForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('text');
        $builder->add('submit', SubmitType::class, [
            'label' => 'Добавить отзыв'
        ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => User::class
        ]);
    }

}