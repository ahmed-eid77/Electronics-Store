<div>
    <div class="container" style="padding: 30px 0px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Coupon
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.coupons') }}" class="btn btn-success pull-right">All Coupons</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent='StoreCoupon()'>

                            <div class="form-group">
                                <div class="col-md-4 control-label">Coupon Code</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Coupon Code" class="form-control input-md"
                                        wire:model="code">
                                    @error('code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">Coupon Type</div>
                                <div class="col-md-4">
                                    <select class="form-control" name="Coupon Type" wire:model="type">
                                        <option value="">Select</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">Coupon Value</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Coupon Value" class="form-control input-md"
                                        wire:model="value">
                                    @error('value')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">Cart Value</div>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Cart Value" class="form-control input-md"
                                        wire:model="cart_value">
                                    @error('cart_Value')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label">Expire Date</div>
                                <div class="col-md-4" wire:ignore>
                                    <input type="text" id="expire-date" placeholder="Expire Date" class="form-control input-md"
                                        wire:model="expire_date">
                                    @error('expire_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Add</button>
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
        $(function() {
            $('#expire-date').datetimepicker({
                    format: 'Y-MM-DD'
                })
                .on('dp.change', function(ev) {
                    var data = $('#expire-date').val();
                    @this.set('expire_date', data);
                });
        });
    </script>
@endpush
