<?php

namespace App\Http\Services\Product;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductService{

    public function getMenu()
    {
        return Menu::where('active',1)->get();
    }

    public function insert($request)
    {  
        try{
            $request->except('_token');
          
            $product = Product::create($request->all());

            // Sử dụng `fresh()` để lấy bản ghi mới nhất từ cơ sở dữ liệu
            $freshProduct = $product->fresh();
            return true; 
        }catch(\Exception $e){
            $request->session()->flash('error', 'Lỗi!');
            DB::rollBack();
            echo $e->getMessage(); // In ra thông báo lỗi cụ thể
            die(); 
            return false;
        }
      
    }

    public function get(){
        return Product::
        orderBy('id')->paginate(10);
    }
    
    public function active($active = 0){
        return $active == 0 ? '<span class="btn- btn-danger">NO</span>' : '<span class="btn- btn-success">YES</span>'; 
    }

    public function getProduct($id){
        $product = Product::findOrFail($id);
        return $product;
    }

    public function updateProduct($request, $id){
         // Bắt đầu một giao dịch
         DB::beginTransaction();
         try{
            $product = Product::findOrFail($id);
            $product->update($request->all());
            return $product;
         }catch(\Exception $e){
            // Nếu có lỗi, hủy bỏ giao dịch và in ra thông báo lỗi cụ thể
            DB::rollBack();
            echo $e->getMessage(); 
            die(); 
            return false; 
        }
      
    }

    public function destroyProduct($id){
          // Bắt đầu một giao dịch
          DB::beginTransaction();
          try{
            $product =  Product::Find($id);
            if($product){
                $product->delete();
                return true;
            }
          }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage(); 
            die(); 
            return false; 
        }
    }

    public function searchProduct($request)
    {
        DB::beginTransaction();
        try{
            $query = $request->input('query');
            $products = Product::where('name','like','%'.$query.'%')
                        ->paginate(10)->withQueryString(); // Phân trang khi tìm kiếm dùng withQueryString thay vì get()
            return $products;
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage(); 
            die(); 
            return false; 
        }
    }

    public function showHome(){
        return Product::select('id','name','price','price_sale','active','thumb')->where('active',1)->orderByDesc('id')->get();
    }

    public function showmodal($id){
        return Product::find($id);
    }
    

}