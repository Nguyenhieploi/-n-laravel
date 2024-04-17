<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;


class MenuHeaderController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function index(Request $request, $slug)
    {
        $menu = $this->menuService->GetId($slug);
        $products = $this->menuService->getProduct($menu, $request);
        $title = $menu->name;

        return view('menu',compact('title','products','menu'));
    }
}
