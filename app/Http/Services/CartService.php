<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr; 
use App\Models\Product;
class CartService
{
    public function addToCart($product_id, $qty)
    {
        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

      
        $carts = session()->get('carts', []);
        if(is_null($carts)){
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        if (array_key_exists($product_id, $carts)) {
            $newQuantity = $carts[$product_id] + $qty;
    
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $carts[$product_id] = $newQuantity;
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
            $carts[$product_id] = $qty;
        } 
        // Lưu giỏ hàng mới vào session
        session()->put('carts', $carts);
       
        return true;
    }
    
    public function getProduct(){
      
        $carts = Session::get('carts');
        if(is_null($carts)){
            return [];
        }

        $productId = array_keys($carts);
        return Product::select('id','name','price','price_sale','thumb')->where('active',1)->whereIn('id',$productId)->get();
    }

    public function update($request){
        session()->put('carts', $request->input('num-product'));
        return true;
    }
}