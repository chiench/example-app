<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                @if (session('add-error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('add-error') }}
                </div>
                @endif
                @if (Session::has('Update-success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('Update-success') }}
                </div>
                @endif

                <div class="panel panel-default">
                    <div style="display:flex; justify-content: space-between;align-items: center;"  class="panel-heading">Choose Home Categories
                        {{-- <div class="search">
                            <a href="{{route('admin.categories')}}" class="btn btn-danger">All Categories</a>
                        </div> --}}
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent='updateHomeCategories' >
                            <div class="form-group">
                                <label class="control-label col-md-4" for="sel_categories">Categories</label>
                                <div class="col-md-4" wire:ignore>
                                    <select name="categories" class="sel_categories form-control " wire:model='sel_categories' multiple='multiple' >
                                        @foreach ($categories as $item )
                                            <option value="{{$item->id}}" >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-4" for="no_of_product">No of product</label>
                              <div class="col-md-4">
                                <input type="text" class="form-control" wire:model='no_of_product' id="no_of_product" placeholder="Enter no_of_product">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-offset-4 col-md-4  ">
                                <button type="submit" style="width: 100px;" class="btn btn-success">Save</button>
                              </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    // Nhúng thư viện giúp multiple select đẹp hơn
    $(document).ready(function(){
        $('.sel_categories').select2();
        $('.sel_categories').on('change',function(){
            var data =  $('.sel_categories').select2("val");
            @this.set('sel_categories',data);
        })
    });
</script>

@endpush
