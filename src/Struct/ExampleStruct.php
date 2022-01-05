<?php declare(strict_types=1);

namespace SzCustomPlugin\Struct;

use Shopware\Core\Framework\Struct\Struct;

class ExampleStruct  extends Struct {

    private $name;

    public function getName() {
        return $this->name;
    }
    
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}