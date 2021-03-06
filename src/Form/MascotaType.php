<?php

namespace App\Form;


use App\Entity\Mascota;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;





class MascotaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, array(
             'required' => true,
             'empty_data' => 'Nombre',
             'attr' => array(
                'class'=> 'campos'
             )
        ))

            ->add('nombre')
            ->add('animal')
            ->add('fechanac')
            
            ->add('cliente',EntityType::class,array(
                'class' => Cliente::class,
                'choice_label' => function ($categoria) {
                    return $cliente->getNombre();
            }))
            ->add('save', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-success'),
        ));
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mascota::class,
        ]);
    }
}
