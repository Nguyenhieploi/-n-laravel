@extends('admin.main')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <form action="{{ route('store.product') }}" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="menu">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nhập tên sản phẩm">
                        @error('name')
                            <div class="alert-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
              
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="menu_id">
                            <option value="0"> Danh Mục </option>
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}"> {{ $menu->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{ old('price') }}"  class="form-control" >
                        @error('price')
                            <div class="alert-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input type="number" name="price_sale" value="{{ old('price_sale') }}"  class="form-control" >
                        @error('price_sale')
                        <div class="alert-message">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id="editor" class="form-control">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Ảnh sản phẩm</label>
                <input type="file" name="file" class="form-control" id="upload">

                @error('file')
                    <div class="alert-message">{{ $message }}</div>
                @enderror

                <div id="image_show">
                    <a href="{{ old('file') }}" target="_blank">
                        <img src="{{ old('file') }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{ old('file') }}">

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
            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
         ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
