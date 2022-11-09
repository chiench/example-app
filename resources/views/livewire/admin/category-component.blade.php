<div>
    <style>

    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
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
                <div class="panel panel-default">
                    <div class="panel-heading">All Categories

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
                            <a href="{{route('admin.categories.add')}}" class="btn btn-success">Add Category</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Updated_at</th>
                                <th class='text-right'>Tools</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $item)
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->slug}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td class="text-right">
                                        <a name="" id="" class="btn btn-sm btn-primary" href="{{route('admin.categories.edit',['slug'=> $item->slug])}}" role="button">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a name="" id="" class="btn btn-sm btn-danger btndelete" wire:click.prevent='deletecat({{$item->id}})' href="" role="button">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                          {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
