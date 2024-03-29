<?php

namespace App\Controller;

use App\Controller\Traits\DataTrait;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    use DataTrait;

    /**
     * @Route("/", name="app_home")
     */
    public function home()
    {
        return $this->render('item/home.html.twig', [
        ]);
    }

    /**
     * @Route("/api/items", name="items")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getItems(
        ItemRepository $itemRepository
    ) {
        $items = $itemRepository->findAllOrder(['id' => 'ASC']);
        $arrData = $this->getJsonArrData($items);

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent(json_encode($arrData));

        return $response;
    }
}
