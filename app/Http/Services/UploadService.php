<?php
namespace App\Http\Services;


class UploadService{
   public function store($request){
    if ($request->hasFile('file')) { // file trong ('file') là name của input
        try{
            $file = $request->file('file'); // Khởi tạo biến $file
            $name = $file->getClientOriginalName(); // lấy tên gốc của tệp
            
            $pathFull = 'uploads/'.date('Y/m/d');
            $path = $file->storeAs(
                'public/' . $pathFull, $name
            ); 
    
            return '/storage/'.$pathFull.'/'.$name; // cấu trúc trả vền là storage/uploads/nam-thang-ngay/ten fiile

        }catch(\Exception $error){
            \Log::error($error->getMessage());
            return false;
        }
            
       
    }
    
   }
}