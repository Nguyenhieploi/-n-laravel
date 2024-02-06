<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Slider\SliderRequest;
use App\Http\Services\Slider\SliderService;

class SliderController extends Controller
{
    protected $sliderService;
    public function  __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function create()
    {
        $title = 'Thêm slider mới';
        return view('admin.slider.add',compact('title'));
    }

    public function store(SliderRequest $request){
        $slider = $this->sliderService->insert($request);
        return back()->with('success','Thêm mới thành công');
    }

    public function index(){
        $sliders = $this->sliderService->showAll();
        $title = 'Danh sách slider';
        return view('admin.slider.list',compact('title','sliders'));
    }

    public function show($id){
        $title = 'Chỉnh sửa slider';
        $slider = $this->sliderService->getSlider($id);
        return view('admin.slider.edit',compact('title','slider'));
    }

    public function update(SliderRequest $request, $id){
        $update = $this->sliderService->update($request,$id);
       if($update){
        return redirect()->route('list.slider')->with('success','Cập nhật thành công');
       }
       return redirect()->route('list.slider')->with('errror','Cập nhật thất bại');
    }

    public function destroy($id){
        $destroy = $this->sliderService->destroy($id);
        if($destroy){
            return redirect()->route('list.slider')->with('success','xóa thành công');
        }
        return redirect()->route('list.slider')->with('errror','Xóa thất bại');
    }

    public function search(Request $request){
        $sliders = $this->sliderService->search($request);
        $title = 'Danh sách slider';
        if($sliders){
            return view('admin.slider.list',compact('sliders','title'));
        }
        return redirect()->route('list.slider')->with('errror','tìm thất bại');
    }
}
