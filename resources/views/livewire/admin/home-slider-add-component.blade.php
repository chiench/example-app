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
                    <div style="display:flex; justify-content: space-between;align-items: center;" class="panel-heading">Add Homeslider
                        <div class="search">
                            <a href="{{route('admin.homeslider')}}" class="btn btn-danger">All Homeslider</a>
                        </div>
                    </div>
                     <!-- Content -->
                    <div class="panel-body">
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent='AddHomeSlider'>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="title">Title</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model='title' id="title"  placeholder="Enter title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="subtitle">Subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model='subtitle' id="subtitle"  placeholder="Enter subtitle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="price">Price</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" wire:model='price' id="price"  placeholder="Enter price">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4" for="link">Link</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model='link' id="link"  placeholder="Enter link">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-4" for="status"> Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='status' id="status" id="">
                                        <option value="0" >Inactive</option>
                                        <option value="1" > Active</option>
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
