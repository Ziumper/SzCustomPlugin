<?php declare(strict_types=1);

namespace SzCustomPlugin\Commands;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Kernel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommand extends Command {

    /**
     * @var Kernel
     */
    private $kernel;

    /**
     * @var EntityRepositoryInterface
     */
    private $productRepository;

    public function __construct(Kernel $kernel, EntityRepositoryInterface $entityRepository) 
    {
        parent::__construct("Example name");

      
        $productEntity = null;

        $this->kernel = $kernel;
        $this->productRepository = $entityRepository;
    }

    protected function configure()
    {
        $this->setName("example")->setDescription("Hello World!");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Hello World!");
        $cacheDirectory = $this->kernel->getCacheDir();

        $output->writeln($cacheDirectory);

        $criteria = new Criteria();
        $context = Context::createDefaultContext();

        $searchResult = $this->productRepository->search($criteria,$context);

        /**
        * @var ProductEntity $product
        */
        foreach ($searchResult->getEntities() as $product) $output->writeln($product->getId());

        return 0; // everything went fine
    }

    
}