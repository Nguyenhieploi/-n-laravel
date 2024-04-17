<?php

namespace App\Http\Services\Menu;
use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuService{

    public function getParent() {
        return Menu::where('parent_id',0)->get();
    }

    public function create($request){
        try{
            Menu::create([
                'name' =>  $request->input('name'),
                'parent_id' =>  $request->input('parent_id'),
                'description' =>  $request->input('description'),
                'content' => $request->input('content'),
                'active' =>  $request->input('active'),
                'slug' => Str::slug($request->input('name'), '-'),
                'thumb' =>  $request->input('thumb'),
            ]);

        }catch(\Exception $e){
            $request->session()->flash('error', 'Lỗi!');
            DB::rollBack();
            echo $e->getMessage(); // In ra thông báo lỗi cụ thể
            die(); // Dừng chương trình
            return false; // Trả về false nếu có lỗi xảy ra
        }
        return true;
    }
    public function getAll(){
        return Menu::orderBy('id')->get();
    }

    public function buildMenu($menus, $parent_id = 0, $char = '') {
        $html = '';  // Khởi tạo biến lưu HTML
        
            // Duyệt qua từng mục trong danh sách menus
        foreach ($menus as $menu) {
            // Kiểm tra xem mục hiện tại có phải là con của mục đang xét không
            if ($menu->parent_id == $parent_id) {
                $html .= '<tr>';
                $html .= '<td>' . $menu->id . '</td>';
                $html .= '<td>' . $char . $menu->name . '</td>';
                $html .= '<td><img style="width:100px" src="'.$menu->thumb.'"> </td>';
                $html .= '<td>' . $this->active($menu->active) . '</td>';
                $html .= '<td>' . $menu->updated_at . '</td>';
                $html .= '<td class="action">
                            <form method="POST" action="' . route('destroy.menu', ['id' => $menu->id]) . '" onsubmit="return confirm(\'Không thể khôi phục sau khi xóa. Bạn chắc chắn xóa chứ ?\');">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    </svg>
                                </button>
                            </form>
                            <a href="' . route('edit.menu', ['id' => $menu->id]) . '">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>
                            </a>
                        </td>';

                $html .= '</tr>';
                

            // Đệ quy: Gọi lại hàm buildMenu để xử lý các mục con của mục hiện tại
            // Tăng ký tự đặc biệt (ví dụ: thêm --) để đánh dấu mức độ phân cấp của mục con
                $html .= $this->buildMenu($menus, $menu->id, $char . '--');
            }
        }

        return $html;
    }

    public function getMenu($id){
        $menu = Menu::findOrFail($id);
        return $menu;
    }

    public function update($request, $id){
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return $menu;
    }

    public function destroy($id){
        $menu = Menu::find($id);
        if($menu){
            $menu->delete();
            return true;
        }

        return false;
    }

    public function active($active = 0){
        return $active == 0 ? '<span class="btn- btn-danger">NO</span>' : '<span class="btn- btn-success">YES</span>'; 
    }

    public function showHome(){
        return Menu::select('name','id','slug','thumb')->where('parent_id',0)->orderByDesc('id')->get();
    }
    
    public function GetId($slug){
        return Menu::where('slug',$slug)->where('active',1)->firstOrFail();
    }


    public function getProduct($menu, $request){
        
        // trỏ đến class trong file Model Menu
        $query = $menu->products()->select('id','name','price','price_sale','thumb')
                ->where('active',1);
       
        if($request->input('price')){
            $query->orderBy('price',$request->input('price'));
        }
        return $query->orderByDesc('id')->paginate(8)->withQueryString();

        
    }
}