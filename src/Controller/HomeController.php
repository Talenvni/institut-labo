<?php

namespace App\Controller;

use App\Entity\Prestation;
use App\Repository\CategoryRepository;
use App\Repository\PrestationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {
	/**
	 * @Route("/", name="home")
	 * @param CategoryRepository $repository
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function index( CategoryRepository $repository ) {
		return $this->render( 'home/index.html.twig', [
			'categories' => $repository->findAll()
		] );
	}

	/**
	 * @Route("/prestations/{slug}-{id}", name="prestation", requirements={"slug": "[a-z0-9\-]*"})
	 * @param CategoryRepository $category
	 * @param PrestationRepository $prestation
	 * @param string $slug
	 * @param int $id
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function show( CategoryRepository $category, PrestationRepository $prestation, string $slug, int $id ) {
		$category    = $category->find( $id );
		$prestations = $prestation->findBy(
			[ 'category' => $id ]
		);

		if ( $category->getSlug() !== $slug || $category->getId() !== $id ) :
			return $this->redirectToRoute( 'prestation', [
				'id'   => $category->getId(),
				'slug' => $category->getSlug()
			], 301 );
		endif;

		return $this->render( 'home/show.html.twig', [
			'category'    => $category,
			'prestations' => $prestations
		] );
	}
}
