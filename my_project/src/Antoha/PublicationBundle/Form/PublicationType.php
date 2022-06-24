<?php

namespace Antoha\PublicationBundle\Form;

use Antoha\PublicationBundle\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PublicationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('postFile', VichImageType::class, [
                'required'=>false])
            ->add('description')
            ->add('tags', EntityType::class,['choice_label'=>'tagName', 'class'=>Tag::class, 'multiple'=>true])
        ->add('text');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Antoha\PublicationBundle\Entity\Publication',
            'mapped' => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'antoha_publicationbundle_publication';
    }


}
