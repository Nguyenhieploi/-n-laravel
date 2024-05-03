<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $productService;
     public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(){
        $title = 'Danh sách sản phẩm';
        $products = $this->productService->get();
        return view('admin.products.list',compact('title','products'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới sản phẩm';
        $menus = $this->productService->getMenu();
        return view('admin.products.add',compact('title','menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
    
        $this->productService->insert($request);
        return redirect()->route('create.product')->with('success','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Chỉnh sửa sản phẩm';
        $menus = $this->productService->getMenu();
        $product = $this->productService->getProduct($id);
        return view('admin.products.edit',compact('title','menus','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $product = $this->productService->updateProduct($request, $id);
        return redirect()->route('list.product')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productService->destroyProduct($id);
        if($product == true){
            return redirect()->route('list.product')->with('success','Xóa thành công');
        }
        return back()->with('error', 'Không thể xóa.');
    }

    public function search(Request $request)
    {
        $products = $this->productService->searchProduct($request);
        $title = 'Danh sách sản phẩm';
        if ($products) {
            // Nếu có sản phẩm, trả về view với sản phẩm
            return view('admin.products.list', compact('products','title'));
        } else {
            // Nếu không có sản phẩm hoặc có lỗi, redirect với thông báo
            return redirect()->route('list.product')->with('error', 'Không tìm thấy sản phẩm hoặc có lỗi xảy ra');
        }
    }
    
    

}
