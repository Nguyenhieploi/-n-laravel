<?php

namespace App\Http\Services;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendMail;

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

    public function remove($id){
        $carts = Session::get('carts');
        unset($carts[$id]);

        session()->put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {
        
            $carts = $request->session()->get('carts');
          
            if (is_null($carts)) {
                return false;
            }

            $customerData = $request->except(['_token']);
            $customer = Customer::create($customerData);
       
            $infoProduct = $this->infoProductCart($carts, $customer->id);

            #Queue 
            SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));

            $request->session()->forget('carts');

            return true;
      
    }

    protected function infoProductCart($carts, $customer_id)
    {

        $productId = array_keys($carts);

        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();

        $data = [];
      
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'qty'   => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
            ];
        }
        Cart::insert($data);
    }

    public function getCustomer(){
        return Customer::orderByDesc('id')->paginate(15);
    }
}