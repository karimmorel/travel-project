<?php

namespace TravelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InventoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name')
        ->add('category_id', EntityType::class, array(
            'class' => 'TravelBundle:Category',
            'choice_label' => 'name',
            'choice_value' => 'id',
            'data' => 'id'
            ))
        ->add('priority')
        ->add('minPrice')
        ->add('price')
        ->add('maxPrice')
        ->add('link')
        ->add('informations')
        ->add('buy')
        ->add('worth');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TravelBundle\Entity\Inventory'
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'travelbundle_inventory';
    }


}
