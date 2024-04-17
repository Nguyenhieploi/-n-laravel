<?php
 
 namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CartComposer
{
    public function __construct() 
    {
        // Constructor content here, if needed.
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if(is_null($carts)){
            return [];
        }

        $productId = array_keys($carts);
        $products =  Product::select('id','name','price','price_sale','thumb')->where('active',1)->whereIn('id',$productId)->get();

       $view->with('products',$products);
    }

   
    
  

}
