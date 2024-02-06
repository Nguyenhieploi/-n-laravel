<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;
    
    public function __construct (MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function create(){
        return view('admin.menu.add',[
            'title' => 'Thêm danh mục mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request){
    
        $this->menuService->create($request);
        return redirect()->route('create')->with('success','Thêm mới thành công'); 
    }

    public function list() {
        $menus = $this->menuService->getAll();
        $menuHtml = $this->menuService->buildMenu($menus);
    
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục',
            'menuHtml' => $menuHtml
        ]);
    }
    
        // Hiển thị form sửa
        public function edit($id)
        {
            $getParents =  $this->menuService->getParent();
            $menu = $this->menuService->getMenu($id);
            $title = 'Chỉnh sửa danh mục';
            return view('admin.menu.edit', compact('menu','getParents','title'));
        }

        public function update(Request $request, $id){
            $menu = $this->menuService->update($request, $id);
            return redirect()->route('list.menu')->with('success', 'Cập nhật thành công');
        }

    public function destroy($id){
        if($this->menuService->destroy($id)){
            return redirect()->route('list.menu')->with('success', 'Menu đã được xóa thành công.');
        }

        return back()->with('error', 'Không thể xóa menu.');
     }

}
