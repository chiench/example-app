
    <div class="wrap-search center-section">
        <div class="wrap-search-form">
        {{-- {{$search}}
            {{$product_cat_name}} --}}
            <form action="{{route('search')}}" id="form-search-top"  name="form-search-top">
                <input type="text" name="search" value="{{$search}}"
                    placeholder="Search here...">
                <button form="form-search-top" type="submit"><i class="fa fa-search"
                        aria-hidden="true"></i></button>
                <div class="wrap-list-cate">
                    <input type="hidden" name="product_cat_name" value="{{$product_cat_name}}" id="product-cate">
                    <input type="hidden" name="product_cat_id" value="{{$product_cat_id}}" id="product-cate">
                    <a href="#" class="link-control"> {{ str_split($product_cat_name,12)[0] }}</a>
                    <ul class="list-cate">
                        @foreach ($categories as $item )
                        <li class="level-1" data-id="{{$item->id}}">{{$item->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </form>
        </div>
    </div>
