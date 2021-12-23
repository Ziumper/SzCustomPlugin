<?php declare(strict_types=1);


namespace SzCustomPlugin\Controller;

use Shopware\Core\Framework\Context;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Example json controller class
 * @RouteScope(scopes={"storefront"}) 
 */
class ExampleJsonController extends AbstractController {


    /**
     * Example json controller class get data method
     * 
     * XmlHttpRequest - is required for security reasons 
     * 
     * @Route("sz/json",name="frontend.sz.json", methods={"GET"},defaults={"XmlHttpRequest"=true})
     *
     * @param Request $request
     * @param Context $context
     * @return JsonResponse
     */
    public function getData(Request $request, Context $context) : JsonResponse {
        return new JsonResponse([
            'foo' => 'bar'
        ]);
    }
}