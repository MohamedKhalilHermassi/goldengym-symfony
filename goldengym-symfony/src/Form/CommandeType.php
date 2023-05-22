<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\RadioType;


class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('AdresseLivraison')
            
            ->add('methodePaiement', ChoiceType::class, [
                'label' => 'Méthode de paiement',
                'choices' => [
                    ' par chèque' => 'Chèque',
                    ' par carte bancaire' => 'Carte bancaire',
                    ' à la livraison (+ 7 Dt)' => 'à la livraison',
                ],
                'expanded' => true,
                'multiple' => false,

            ])

            ->add('telephone');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
