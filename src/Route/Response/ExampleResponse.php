<?php declare(strict_types=1);

namespace SzCustomPlugin\Route\Response;


use SzCustomPlugin\Struct\ExampleStruct;
use Shopware\Core\System\SalesChannel\StoreApiResponse;

class ExampleResponse extends StoreApiResponse {


    public function __construct(ExampleStruct $struct) 
    {
        parent::__construct($struct);
    }

}
