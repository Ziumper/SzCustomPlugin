<?php declare(strict_types=1);

namespace SzCustomPlugin\Route;

use OpenApi\Annotations as OA;
use Shopware\Core\System\SalesChannel\StoreApiResponse;
use SzCustomPlugin\Route\Response\ExampleResponse;
use SzCustomPlugin\Struct\ExampleStruct;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @RouteScope(scopes="store-api")
 */
class ExampleRoute {

    /**
     * 
     * @OA\Info(title="My First API", version="0.1")
     * @Route("store-api/example", name="store-api.example", methods={"GET", "POST"})
     */
    public function load(): StoreApiResponse {
        //create a struct first
        $exampleStruct = new ExampleStruct("Test Name!");
        return new ExampleResponse($exampleStruct);
    }
}