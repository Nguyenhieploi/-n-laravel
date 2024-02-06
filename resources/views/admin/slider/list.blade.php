@extends('admin.main')


@section('content')
    <form action="{{ route('search.slider') }}" method="GET" class="mt-3 mb-3 ml-2">
        <input type="text" name="query" placeholder="Tìm kiếm sản phẩm..." class="input-search-product">
        <button type="submit" class="btn-search-product">Tìm kiếm</button>
    </form>
  
   <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Link</th>
            <th>Ảnh</th>
            <th>Trạng thái</th>
            <th>Cập nhật</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        {{-- Menu là product model --}}
        
        @foreach($sliders as $slider)
        <tr>
            <td> {{ $slider->id }} </td>
            <td> {{ $slider->name }}</td>
            <td> {{ $slider->url }}</td>
            <td> <img class="img-product" src="{{ old('thumb',$slider->thumb) }}" width="100px"></td>
            <td> {!!$slider->active == 0 ? '<span class="btn- btn-danger">NO</span>' : '<span class="btn- btn-success">YES</span>'  !!}</td>
            <td> {{ $slider->updated_at }} </td>
            <td class="action">
                <form method="POST" action="{{ Route('destroy.slider',$slider->id) }}" onsubmit="return confirm('Không thể khôi phục sau khi xóa. Bạn chắc chắn xóa chứ ?');">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                            <path d="M3 6h18"/>
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                        </svg>
                    </button>
                </form>
                
                <a href="{{ Route('edit.slider',$slider->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                        <path d="m15 5 4 4"/>
                    </svg>
                </a>           
            </td>

        </tr>
        @endforeach
    </tbody>
    
   </table>
   {{ $sliders->links() }}
@endsection


