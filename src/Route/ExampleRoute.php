<?php declare(strict_types=1);

namespace SzCustomPlugin\Route;

use OpenApi\Annotations\Get;
use OpenApi\Annotations as OA;
use Shopware\Core\System\SalesChannel\StoreApiResponse;
use SzCustomPlugin\Route\Response\ExampleResponse;
use SzCustomPlugin\Struct\ExampleStruct;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Symfony\Component\Routing\Annotation\Route;
use Shopware\Core\Framework\Routing\Annotation\Since;

/**
 * @RouteScope(scopes="store-api")
 */
class ExampleRoute {

    /**
     * 
     * 
     * 
     * @Since("6.3.0.0")
     * @Get(
     *  path="/example",
     *      summary="Example route",
     *      description="Example resource route",
     *      operationId="exampleResource",
     *      tags={"Store API", "Example"},
     *      @OA\Response(
     *          response="200",
     *          description="Example"
     *     )
     * )
     * @OA\Info(title="My First API", version="0.1")
     * @Route("store-api/example", name="store-api.example", methods={"GET", "POST"})
     */
    public function load(): StoreApiResponse {
        //create a struct first
        $exampleStruct = new ExampleStruct("Test Name!");
        return new ExampleResponse($exampleStruct);
    }
}