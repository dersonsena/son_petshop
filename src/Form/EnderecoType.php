<?php

namespace App\Form;

use App\Entity\Endereco;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnderecoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rua', TextType::class, [
                'label' => 'Logradouro',
                'attr' => [
                    'placeholder' => 'Informa a Rua/Avenida ...',
                    'class' => 'form-control'
                ]
            ])
            ->add('numero', TextType::class, [
                'label' => 'Nº',
                'attr' => [
                    'placeholder' => 'Nº',
                    'class' => 'form-control'
                ]
            ])
            ->add('bairro', TextType::class, [
                'label' => 'Bairro',
                'attr' => [
                    'placeholder' => 'Informe o bairro...',
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Endereco::class,
        ]);
    }
}
