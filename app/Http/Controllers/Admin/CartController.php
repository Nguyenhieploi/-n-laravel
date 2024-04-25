<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart){
        $this->cart = $cart;
    }

    public function index(){
        $customers = $this->cart->getCustomer();
        $title = 'Danh sách đơn hàng';
        return view('admin.cart.customer',compact('title','customers'));
    }
}
