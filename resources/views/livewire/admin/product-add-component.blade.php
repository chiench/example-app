<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <!-- Notification -->
                @if (session('add-error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('add-error') }}
                </div>
                @endif
                @if (Session::has('add-success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('add-success') }}
                </div>
                @endif
                <!-- Main -->
                <div class="panel panel-default">
                     <!-- Search -->
                    <div style="display:flex; justify-content: space-between;align-items: center;" class="panel-heading">Add Categories
                        <div class="search">
                            <a href="{{route('admin.products')}}" class="btn btn-danger">All Products</a>
                        </div>
                    </div>
                     <!-- Content -->
                    <div class="panel-body">
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent='storeProduct()'>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="name">Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model='name' wire:keyup='generateSlug'  id="name"  placeholder="Enter name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="slug">Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model='slug' id="slug"  placeholder="Enter slug">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="regular_price">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" wire:model='regular_price' id="regular_price"  placeholder="Enter regular_price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="sale_price">Sales Price</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" wire:model='sale_price' id="sale_price"  placeholder="Enter Sales Price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="short_description">Short Description</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model='short_description' id="short_description"  placeholder="Enter Short Description">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="description">Description</label>
                                <div class="col-md-4">
                                    <textarea autocomplete=""   name="" id="" cols="30" rows="5" class="form-control" wire:model='description' id="description"  placeholder="Enter Description"></textarea>                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="SKU">SKU</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control" wire:model='SKU' id="SKU"  placeholder="Enter SKU">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="stock_status">Stock Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='stock_status' id="stock_status" id="">
                                        <option value="instock" >Instock</option>
                                        <option value="outofstock"  >Outofstock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="featured">Featured</label>
                                <div class="col-md-4">
                                    <select name=""class="form-control" wire:model='featured' id="featured" id="">
                                        <option value="0">Yes</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="image">Image</label>
                                <div class="col-md-4 d-flex flex-row">
                                    <input type="file" wire:model='image' class="input-file" id="image">
                                    @if ($image)
                                    <img  style="margin-top: 25px;" height="200" width="200" src="{{ $image->temporaryUrl() }}">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="category_id">Categories</label>
                                <div class="col-md-4">
                                    <select name=""class="form-control"  wire:model='category_id' id="category_id" required>
                                        @foreach ($categories as $item )
                                            <option value="{{$item->id}}" >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="quatity">Quatity</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" wire:model='quatity' id="quatity"  placeholder="Enter Quatity">
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
