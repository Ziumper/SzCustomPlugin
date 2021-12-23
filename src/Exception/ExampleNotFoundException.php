<?php declare(strict_types=1);

namespace SzCustomPlugin\Exception;

use Shopware\Core\Framework\ShopwareHttpException;
use Symfony\Component\HttpFoundation\Response;

class ExampleNotFoundException extends ShopwareHttpException {
    
    public function getStatusCode(): int
    {
        return Response::HTTP_NOT_FOUND;
    }

    public function getErrorCode(): string
    {
        return "EXAMPLE__PAGE_NOT_FOUND";
    }

}