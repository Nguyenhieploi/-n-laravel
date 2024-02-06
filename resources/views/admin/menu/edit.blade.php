@extends('admin.main')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <form action="{{ route('update.menu',['id' => $menu->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$menu->name) }}" placeholder="Nhập tên danh mục">
                @error('name')
                    <div class="alert-message">{{ $message }}</div>
                @enderror
            </div>
          

            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="parent_id">
                    <option value="0"> Danh Mục Cha </option>
                    @foreach ($getParents as $parent)
                        <option value="{{ $parent->id }}" {{ $menu->parent_id == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control">{{ old('description',$menu->description) }}</textarea>
                @error('description')
                    <div class="alert-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id="editor" class="form-control">{{ old('content',$menu->content) }}</textarea>
                @error('content')
                    <div class="alert-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Menu</label>
                <input type="file" name="file" class="form-control" id="upload">

                @error('file')
                    <div class="alert-message">{{ $message }}</div>
                @enderror

                <div id="image_show">
                    <a href="{{ old('file') }}" target="_blank">
                        <img src="{{ old('file',$menu->thumb) }}" width="100px">
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
            <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
        </div>
     
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
