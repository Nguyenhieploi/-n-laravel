<?php
 
 namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Menu;

class MenuComposer
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
        $menus = Menu::select('id', 'name', 'parent_id', 'active','slug')
                      ->where('active', 1)
                      ->orderByDesc('id')
                      ->get();
        $menuHtml = $this->buildMenu($menus);
        $view->with('menuHtml', $menuHtml);
    }

    protected function buildMenu($menus, $parent_id = 0, $char = '')
    {
        $html = ''; // Khởi tạo biến lưu HTML
    
        foreach ($menus as $key => $menu) { 
            if ($menu->parent_id == $parent_id) {
                $html .= '<li>';
                // Thêm thẻ <a> vào tên menu. Giả sử mỗi menu có một URL riêng được lưu trong cột 'url'.
                // Nếu bạn không có cột 'url', bạn có thể thay thế '#' hoặc một giá trị cụ thể khác.
                $html .= '<a href="' . (isset($menu->slug) ? route('category.product', ['slug' => $menu->slug]) : '#') . '">' . $char . $menu->name . '</a>';

                // Xử lý mục con
                $childHtml = $this->buildMenu($menus, $menu->id, $char);
                if (!empty($childHtml)) {
                    $html .= '<ul class="sub-menu">' . $childHtml . '</ul>';
                }
    
                $html .= '</li>';
            }
        }
    
        return $html;
    }
    
  

}
