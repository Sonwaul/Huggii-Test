<?php

namespace App\Form;

use App\Entity\Sujet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SujetAjoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('libelle',TextareaType::class,array('label'=>'Nom du sujet : ', 'required' => true, 'attr' => array('style' => 'width: 80%; margin-bottom: -10px; margin-left: 10px; height: 35px; box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; resize: none; white-space: pre-line;')))
        ->add('save',SubmitType::class, array('label'=>'Création du Sujet', 'attr' => array('style' => 'margin-top: 10px;')));
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sujet::class,
        ]);
    }
}
