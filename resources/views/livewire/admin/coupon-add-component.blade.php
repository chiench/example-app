<div>
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
                    <div style="display:flex; justify-content: space-between;align-items: center;" class="panel-heading">
                        Add Categories
                        <div class="search">
                            <a href="{{ route('admin.coupon') }}" class="btn btn-danger">All Coupon</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent='storeCoupon'>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="code">Code:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="code" wire:model='code' required
                                        placeholder="Enter code">
                                    {{-- @error('code')
                                        <span class="error">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="value">Value:</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" id="value" wire:model='value'
                                        required placeholder="Enter value">
                                    {{-- @error('code')
                                        <span class="error">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="cart_value">Cart value:</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" id="cart_value" wire:model='cart_value'
                                        required placeholder="Enter Cart Value">
                                    {{-- @error('code')
                                        <span class="error">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="type"> Type:</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='type' id="type" id="">
                                        <option value="fixed">Fixed</option>
                                        <option value="percent"> Percent</option>
                                    </select>
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
