<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Cliente;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'label' => 'Nome',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Informe o nome do cliente.'
                ]
            ])
            ->add('telefone', TextType::class, [
                'label' => 'Telefone',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Informe o telefone do cliente.'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Informe o e-mail do cliente.'
                ]
            ])
            ->add('endereco', EnderecoType::class, ['label' => false])
            ->add('animal', EntityType::class, [
                'class' => Animal::class,
                'choice_label' => 'nome',
                'multiple' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('salvar', SubmitType::class, [
                'label' => 'Salvar',
                'attr' => ['class' => 'btn btn-success']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cliente::class,
        ]);
    }
}
