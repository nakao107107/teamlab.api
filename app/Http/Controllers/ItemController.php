<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use App\Requests\Item\ShowRequest;
use App\Requests\Item\StoreRequest;
use App\Requests\Item\UpdateRequest;

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

    public function store(StoreRequest $request)
    {
        $res = $this->item_service->createCase(
            $request->validated()
        );
        return response($res);
    }

    public function update(UpdateRequest $request)
    {
        $res = $this->item_service->updateItem(
            $request->route('item_id'),
            $request->validated()
        );
        return $res;
    }
}
