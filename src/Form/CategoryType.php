<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType {
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'name', null, [ 'attr' => [ 'placeholder' => 'Category name' ] ] )
			->add( 'imageFile', FileType::class, [ 'required' => false ] )
			->add('visible', ChoiceType::class, [
				'choices' => ['yes' => true, 'no' => false]
			]);
	}

	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( [
			'data_class'         => Category::class,
			'translation_domain' => 'forms'
		] );
	}
}
