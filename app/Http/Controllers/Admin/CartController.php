<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;

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

    public function show(Customer $customer){
        $customer = $customer;
        $carts = $customer->carts()->get();
        $title = 'Chi tiết đơn hàng'.$customer->name;
        return view('admin.cart.detail',compact('title','customer','carts'));
    }
}
