<?php declare(strict_types=1);


namespace SzCustomPlugin\Storefront\Controller;

use Psr\Log\LoggerInterface;
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

    /**
     * @var LoggerInterface $logger
     */
    protected $logger;

    public function __construct(
        EntityRepositoryInterface $productRepository,
        LoggerInterface $logger
    )
    {
        $this->productRepository = $productRepository;
        $this->logger = $logger;
    }



    /**
    * @Route("/sz/example", name="frontend.sz.example", methods={"GET"})
    */
    public function showExample(): Response
    {
        $this->logger->info("I am inside show example method and i am saying hello to you");

        return $this->renderStorefront('@SzCustomPlugin/storefront/page/example.html.twig', [
            'hello' => 'Hello world'
        ]);
    }
    
}