<?php
namespace App\Http\Services\Slider;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SliderService{
    
    public function insert($request){
        DB::beginTransaction();
        try{
          $request->except('_token');
          $create = Slider::create($request->all());
          $freshSlider= $create->fresh();
          return true;
        }catch(\Exception $e){
          DB::rollBack();
          echo $e->getMessage(); 
          die(); 
          return false; 
      }
  }

  public function showAll(){
    $sliders = Slider::orderby('id')->paginate();
    return $sliders;
  }

  public function getSlider($id){
    $slider =  Slider::findOrFail($id);
    return $slider;
  }

  public function update($request,$id){
    $updateSlider = Slider::findOrFail($id)->update($request->all());
    return $updateSlider;
  }

  public function destroy($id){
    $destroySlider = Slider::find($id)->delete();
    return $destroySlider;
  }

  public function search($request){
    $query = $request->input('query');
    $search = Slider::where('name', 'like', '%' . $query . '%')->paginate(10)->withQueryString();
    return $search;
  }

  public function showHome(){
    return Slider::where('active',1)->orderByDesc('sort_by')->get();
  }
}