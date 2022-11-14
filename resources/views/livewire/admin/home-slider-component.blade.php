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
                    <div class="panel-heading">All HomeSlide
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
                            <a href="{{route('admin.homeslider.add')}}" class="btn btn-success">Add Slider</a>
                        </div>
                    </div>
                    <!-- content -->
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Price</th>
                                <th>Imgae</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class='text-right'>Tools</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($homeslider as $item)
                                <tr style="align-content: center">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->subtitle}}</td>
                                    <td>${{$item->price}}</td>
                                    @if ($item->image)
                                    <td> <img height="70" width="100" src="{{asset('assets/images/sliders')}}/{{$item->image}}" alt="Product Issmage">
                                    </td>

                                    @else
                                    <td> <img height="70" width="100" src="{{asset('assets/images/products/no-image.png')}}" alt="Product Image">
                                    </td>
                                    @endif
                                    <td>{{$item->link}}</td>
                                    <td>{{$item->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td style=" width: 100px;" class="text-right">
                                        <a name="" id="" class="btn btn-sm btn-primary" href="{{route('admin.homeslider.edit',['id' => $item->id])}}" role="button">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a name="" id="" class="btn btn-sm btn-danger btndelete" wire:click.prevent='deleteHomeSlider({{$item->id}})' href="" role="button">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                          {{-- {{$homeslider->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
