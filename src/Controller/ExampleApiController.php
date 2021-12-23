<?php declare(strict_types=1);

namespace SzCustomPlugin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Symfony\Component\Routing\Annotation\Route;

/**
 * 
 * @RouteScope(scopes={"api"})
 */
class ExampleApiController extends AbstractController {
    
    /**
     * @Route("/api/sz/example", name="api.action.sz.example", methods={"GET"})
     */
    public function apiExample(): JsonResponse
    {
        return new JsonResponse(['foo' => 'bar']);
    }

}