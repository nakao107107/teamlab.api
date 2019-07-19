<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use App\Requests\Item\ShowRequest;

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

    public function show(ShowRequest $request)
    {

        $res = $this->item_service->getItemById(
            $request->route('item_id')
        );

        return response($res);

    }
}
