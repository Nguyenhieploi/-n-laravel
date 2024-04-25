<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $quantity = (int)$request->input('num_product');
        $productId = (int)$request->input('product_id');
      
        $result = $this->cartService->addToCart($productId, $quantity);
        
        if($result == true){
            return back()->with('success',"Thêm vào giỏ hàng thành công");
        }else{
            return back()->with('error',"Thêm vào giỏ hàng thất bại");
        }
        
    }   

    public function show(){
        $products = $this->cartService->getProduct();
       
        $carts = Session::get('carts');
        $title = 'Giỏ hàng';
       return view('carts.list',compact('title','products','carts'));
    }
    

    public function update(Request $request){
      
        $this->cartService->update($request);
        return back()->with('success','Cập nhật thành công');
    }

    public function delete($id){
       $this->cartService->remove($id);
       return back()->with('success','Xoá sản phẩm thành công');
    }

    public function addCart(Request $request){
        $result = $this->cartService->addCart($request);
        if ($result) {
         
            return back()->with('success', 'Đặt hàng thành công');
        } else {
            return back()->with('error', 'Đã có lỗi xảy ra khi đặt hàng');
        }
    }
}
