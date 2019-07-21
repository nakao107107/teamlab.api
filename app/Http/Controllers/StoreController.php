<?php

namespace App\Http\Controllers;

use App\Services\StoreService;

class StoreController extends Controller
{
    private $store_service;

    public function __construct(StoreService $store_service)
    {
        $this->store_service = $store_service;
    }

    public function index()
    {
        $res = $this->store_service->searchStores();

        return response($res);

    }
}
