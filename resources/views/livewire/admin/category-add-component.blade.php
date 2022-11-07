<div>
    <style>

    </style>

    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
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
                <div class="panel panel-default">
                    <div style="display:flex; justify-content: space-between;align-items: center;"  class="panel-heading">Add Categories
                        <div class="search">
                            <a href="{{route('admin.categories')}}" class="btn btn-danger">All Categories</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent='storeCategory' >
                            <div class="form-group">
                              <label class="control-label col-md-4" for="name">Name:</label>
                              <div class="col-md-4">
                                <input type="text" class="form-control" id="name" wire:model='name' wire:keyup="generateSlug" required placeholder="Enter name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-4" for="slug">Slug:</label>
                              <div class="col-md-4">
                                <input type="text" class="form-control" wire:model='slug' id="slug" placeholder="Enter Slug">
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
