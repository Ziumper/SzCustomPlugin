<?php declare(strict_types=1);


namespace SzCustomPlugin\Storefront\Controller;

use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Shopware\Storefront\Page\GenericPageLoaderInterface;
use Shopware\Storefront\Page\Page;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;


/**
 * Undocumented class
 * @RouteScope(scopes={"storefront"})
 */
class GenericPageController extends StorefrontController {

    /**
     * Undocumented variable
     *
     * @var GenericPageLoaderInterface
     */
    protected $genericPageLoader;

    public function __construct(GenericPageLoaderInterface $genericPageLoader)
    {
        $this->genericPageLoader = $genericPageLoader;
    }



    /**
    * @Route("/sz/generic", name="frontend.sz.generic", methods={"GET"})
    */ 
    public function genericExample(Request $request, SalesChannelContext $salesChannelContext) {
        /**
         * @var Page $page 
         * 
         * Use $page variable to edit reference variables inside, like edit header, logo and etc
         */
        $page = $this->genericPageLoader->load($request,$salesChannelContext);       
        return $this->renderStorefront(
            '@SzCustomPlugin/storefront/page/example.html.twig', 
            ['hello' => 'Hello world from generic example '],
            ["page" => $page]
        );

    }

    /**
    * @Route("/sz/redirect/login", name="frontend.sz.redirect.login", methods={"GET"})
    */
    public function redirectToLogin(Request $request, SalesChannelContext $salesChannelContext)  {
        return $this->redirectToRoute('frontend.account.login.page');
    }

    /**
     * Undocumented function
     *
     * @Route("/sz/forward/login", name="frontend.sz.forward.login", methods={"GET"})
     */
    public function forwardToLogin() {
        return $this->forwardToRoute('frontend.account.login.page',['success' => false]);
    }

    /**
    * @Route("/sz/forward/example", name="frontend.sz.forward.example", methods={"GET"})
    */
    public function forwardToExample(Request $request, SalesChannelContext $salesChannelContext)  {
        return $this->forwardToRoute('frontend.sz.example');
    }
}