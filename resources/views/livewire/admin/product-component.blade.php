<div>
    <style>

    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <!-- Notification -->
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                @if (Session::has('succesful-remove'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('succesful-remove') }}
                </div>
                @endif
                <!-- Main -->

                <div class="panel panel-default">
                    <div class="panel-heading">All Products
                        <!-- search -->
                        <div style="margin: 10px 0; display:flex; justify-content: space-between;" class="search">
                            <form class="form-inline" wire:submit.prevent='removeSearch'>
                                <div class="form-group">
                                    <input type="text" name="key" class="form-control" wire:model='search' placeholder="Từ khóa" aria-describedby="helpId">
                                    @if ($search)
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-close"></i></button>
                                    @else
                                    <button type="submit" disabled class="btn btn-primary"><i class="fa fa-close"></i></button>
                                    @endif
                                </div>
                            </form>
                            <a href="{{route('admin.products.add')}}" class="btn btn-success">Add Product</a>
                        </div>
                    </div>
                    <!-- content -->
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Imgae</th>
                                <th>Regular Price</th>
                                <th>Sales Price</th>
                                <th>Short Description</th>
                                <th>Category</th>
                                <th>Updated_at</th>
                                <th class='text-right'>Tools</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr style="align-content: center">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->slug}}</td>
                                    @if ($item->image)
                                    <td> <img height="70" width="100" src="{{asset('assets/images/products')}}/{{$item->image}}" alt="Product Issmage">
                                    </td>

                                    @else
                                    <td> <img height="70" width="100" src="{{asset('assets/images/products/no-image.png')}}" alt="Product Image">
                                    </td>

                                    @endif
                                    <td style="width: 115px;">${{$item->regular_price}}</td>
                                    @if ($item->sale_price)
                                    <td style="width: 115px;">${{$item->sale_price}}</td>
                                    @else
                                    <td style="width: 115px;">{{$item->sale_price}}</td>
                                    @endif
                                    <td>{{$item->short_description}}</td>
                                    @if ($item->category_id)
                                    <td>{{$item->category->name}}</td>
                                    @else
                                    <td>{{$item->category_id}}</td>
                                    @endif

                                    <td>{{$item->updated_at}}</td>
                                    <td style=" width: 100px;" class="text-right">
                                        <a name="" id="" class="btn btn-sm btn-primary" href="{{route('admin.products.edit',['slug' => $item->slug])}}" role="button">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a name="" id="" class="btn btn-sm btn-danger btndelete" wire:click.prevent='deleteProduct({{$item->id}})' href="" role="button">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                          {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
