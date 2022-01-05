<?php declare(strict_types=1);


namespace SzCustomPlugin\Storefront\Controller;

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Storefront\Controller\StorefrontController;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;



/**
 * 
 * @RouteScope(scopes={"storefront"})
 */
class ExampleController extends StorefrontController {
    
    /**
     * Repository for products
     *
     * @var EntityRepositoryInterface
     */
    protected $productRepository;

    public function __construct(EntityRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }



    /**
    * @Route("/sz/example", name="frontend.sz.example", methods={"GET"})
    */
    public function showExample(): Response
    {
        return $this->renderStorefront('@SzCustomPlugin/storefront/page/example.html.twig', [
            'hello' => 'Hello world'
        ]);
    }
    
}