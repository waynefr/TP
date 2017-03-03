<?php

namespace Tp\FdjBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Tp\FdjBundle\Exception\CustomerMessageException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;

use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Tp\FdjBundle\Entity\Fdj;


class ProductController extends FOSRestController
{
    /**
     * List all products.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\QueryParam(name="status", requirements="\d+", default="1", description="How many products to return.")
     *
     * @Annotations\View(
     *  templateVar="products"
     * )
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getProductsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('TpFdjBundle:Fdj')->findAll();
    }

    /**
     * Get products with status.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets products for a given status",
     *   output = "Tp\FdjBundle\Entity\Fdj",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the product is not found"
     *   }
     * )
     *
     * @Annotations\View(templateVar="product")
     *
     * @param sting     $status      the product status
     *
     * @return array
     *
     * @throws NotFoundHttpException when products not exist
     */
    public function getProductAction($status)
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('TpFdjBundle:Fdj')->findBy(['status'=> $status]);
        if (!($products)) {
            throw new CustomerMessageException(sprintf('The resource \'%s\' was not found. The log is in the '
                  . $this->container->getParameter('customer_log_dir_for_dev') 
                  . $this->container->getParameter('customer_log_file_name_for_dev'),$status));
        }
        return $products;
    }
}
