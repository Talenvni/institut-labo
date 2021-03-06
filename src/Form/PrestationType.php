<?php

namespace App\Form;

use App\Entity\Prestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestationType extends AbstractType {
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'name', null, [ 'attr' => [ 'placeholder' => 'Benefit name' ] ] )
			->add( 'price', null, [ 'attr' => [ 'placeholder' => 'Benefit price' ] ] )
			->add( 'description', null, [ 'attr' => [ 'placeholder' => 'Benefit description' ] ])
			->add( 'time', null, [ 'attr' => [ 'placeholder' => 'Benefit time' ] ]);
	}

	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( [
			'data_class'         => Prestation::class,
			'translation_domain' => 'forms'
		] );
	}
}
