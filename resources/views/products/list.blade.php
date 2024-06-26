<div class="row isotope-grid">
    @foreach($products as $key => $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
                    <div class="show-modal block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 p-lr-15 trans-04 js-show-modal1" data-id="{{$product->id}}">
                        Quick View
                    </div>
                    
                    
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                    <a href="{{ route('detail.product', ['id' => $product->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        {{ $product->name }}
                    </a>


                        <span class="stext-105 cl3">
                            @if($product->price_sale)
                                <span class="text-sale">Đang sale</span>
                            @endif
                            {{ number_format($product->price_sale ?? $product->price, 0, '.', ',') }}đ
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
