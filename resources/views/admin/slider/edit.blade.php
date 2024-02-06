@extends('admin.main')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <form action="{{ Route('update.slider',['id' => $slider->id]) }}" method="POST">
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="menu">Tên</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name',$slider->name) }}">
                        @error('name')
                            <div class="alert-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
              
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Đường dẫn</label>
                        <input type="text" name="url" class="form-control" value="{{ old('url',$slider->url) }}">
                        @error('url')
                            <div class="alert-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
            </div>
            <div class="form-group">
                <label for="menu">Ảnh</label>
                <input type="file" name="" class="form-control" id="upload">
                @error('thumb')
                    <div class="alert-message">{{ $message }}</div>
                @enderror

                <div id="image_show">
                    <a href="{{ old('thumb') }}" target="_blank">
                        <img src="{{ old('thumb',$slider->thumb) }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{ old('thumb',$slider->thumb) }}">
            </div>


            <div class="form-group">
                <label>Sắp xếp</label>
                <input type="number" name="sort_by" class="form-control" value="{{ old('sort_by',$slider->sort_by) }}">
            </div>

          

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu slider</button>
        </div>
        @csrf
    </form>
@endsection


