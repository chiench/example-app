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
                    <div style="display:flex; justify-content: space-between;align-items: center;" class="panel-heading">
                        Sales Setting
                        {{-- <div class="search">
                            <a href="{{route('admin.categories')}}" class="btn btn-danger">All Categories</a>
                        </div> --}}
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent='updateSalesTime'>
                            <div class="form-group">
                                <label class="control-label col-md-4">Sale Date</label>
                                <div class="col-md-4">
                                    <input type="text" id="sale_date" class="form-control" wire:model='sale_date'
                                        placeholder="YYYY/MM/DD H:M:S">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="status">Status</label>
                                <div class="col-md-4">
                                    <select name=""class="form-control" wire:model='status' id="status"
                                        id="">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4  ">
                                    <button type="submit" style="width: 100px;" class="btn btn-success">Save</button>
                                </div>
                            </div>

                            {{ \Carbon\Carbon::now() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function() {
            $('#sale_date').datetimepicker({
                    format: 'YYYY-MM-DD h:m:s',
                })
                .on('dp.change', function(e) {
                    var data = $('#sale_date').val();
                    @this.set('sale_date', data);
                })
        });

        // $(function () {
        //          $('#sale_date').datetimepicker();
        //      });
        // $(function(){
        //     $('#sale_date').datetimepicker();
        //     // $('#sale_date').datetimepicker({
        //     //     format : 'Y-MM-DD h:m:s',
        //     // })
        //     // .on('dp.change',function(e){
        //     //     var data = $('#sale_date').val();
        //     //     @this.set('sale_date',data);
        //     // })
        //     // ;
        // })
        // Nhúng thư viện giúp multiple select đẹp hơn
        // $(document).ready(function(){
        //     $('.sel_categories').select2();
        //     $('.sel_categories').on('change',function(){
        //         var data =  $('.sel_categories').select2("val");
        //         @this.set('sel_categories',data);
        //     })
        // });
    </script>
@endpush
