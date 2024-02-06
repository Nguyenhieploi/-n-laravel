<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    public function __construct(SliderService $slider, MenuService $menu, ProductService $product){
        $this->menu = $menu;
        $this->slider = $slider;
        $this->product= $product;
    }

    public function index(){
        $title = 'Shop bán hàng';
        $sliders = $this->slider->showHome();
        $menus = $this->menu->showHome();
        $products = $this->product->showHome();
        return view('main',compact('title','sliders','menus','products'));
    }

    public function show( $id){
        $product = $this->product->showmodal($id);
        if($product){
            return view('main',compact('product'));
        }
    }
}
