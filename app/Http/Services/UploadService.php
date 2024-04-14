<?php
namespace App\Http\Services;
use Illuminate\Support\Facades\Log;


class UploadService
{
    public function store($request)
    {
        // dd($request->hasFile('file'));
        if (true) { 
            try {
                $file = $request->file('file'); 
                $name = $file->getClientOriginalName(); 
                $date = now();
                $year = $date->format('Y');
                $month = $date->format('m');
                $day = $date->format('d');
                
                $pathFull = 'upload/'.$year.'/'.$month.'/'.$day;
                
                // Tạo thư mục nếu nó chưa tồn tại
                if (!file_exists(public_path($pathFull))) {
                    
                    mkdir(public_path($pathFull), 0777, true);
                }
                
                $path = $file->move(public_path($pathFull), $name);
    
                return '/'.$pathFull.'/'.$name; 
    
            } catch (\Exception $error) {
                // Log::error($error->getMessage());
                dd($error);
                //return false;
            }
        }
    }
}
