<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;

class ProductController extends Controller
{   
    protected $productService;

    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    public function index($id){
        $product = $this->productService->show($id);
        $title = $product->name;
        $products = $this->productService->more($id);
        return view('products.detail',compact('product','title','products'));
    }
}
