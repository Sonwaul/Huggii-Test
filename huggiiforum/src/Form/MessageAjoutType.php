<?php

namespace App\Form;

use App\Entity\Message;
use App\Entity\Sujet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MessageAjoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle',TextareaType::class,array('label'=>'Message : ', 'required' => true, 'attr' => array('style' => 'width: 80%; margin-bottom: -10px; margin-left: 10px; height: 75px; box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; resize: none; white-space: pre-line;')))
            ->add('datepublication',DateTimeType::class,['widget' => 'single_text','input'  => 'datetime', 'label'=>'Date de publication : ','data' => new \DateTime("now"), 'attr'=> array('readonly' => true, 'style' => 'margin-top: 10px; margin-left: 10px;') ])
            ->add('sujet',EntityType::class,array('class'=>Sujet::class,'choice_label'=>'libelle', 'attr' => array('style' => 'margin-top: 10px; margin-left: 10px; width: 80%; ')))
            ->add('save',SubmitType::class,array('label'=>'Envoyer votre message', 'attr' => array('style' => 'margin-top: 10px; width: 50%; ')));
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
