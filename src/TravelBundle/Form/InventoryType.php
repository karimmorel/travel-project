<?php

namespace TravelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
        ->add('type', ChoiceType::class, array(
            'choices' => array(
                'Appareil Photo' => 1,
                'Ordinateur' => 3,
                'Micro' => 4,
                'Carte Mémoire' => 6,
                )
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
