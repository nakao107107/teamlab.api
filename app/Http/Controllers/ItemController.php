<?php

namespace App\Http\Controllers;

use App\Services\ItemService;

class ItemController extends Controller
{

    private $item_service;

    public function __construct(ItemService $item_service)
    {
        $this->item_service = $item_service;
    }

    public function index()
    {
        $res = $this->item_service->searchItems(
            []
        );

        return response($res);

    }
}
