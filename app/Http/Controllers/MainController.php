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

    public function quickView( $id){
        $product = $this->product->getProduct($id);
        if($product){
           return response()->json([
            'success'  => true,
             'data' => $product,
           ]);
        }else{
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }
    }

    public function loadProduct(Request $request){
        $page = $request->input('page', 2);
        $products = $this->product->loadMore($page);
        if($products->isEmpty()){
            return response()->json(['html' => '']);
        }

         // Render sản phẩm thành HTML và trả về
        $html = view('main', compact('products'))->render();
        return response()->json(['html' => $html]);
    }

}
