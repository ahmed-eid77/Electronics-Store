<div>
    <div class="container" style="padding: 30px 0px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Update Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All
                                    Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data"
                            wire:submit.prevent='updateProduct()'>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Product Name</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name" class="form-control input-md"
                                        wire:model="name" wire:keyup="generateSlug">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Product Slug</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Slug" class="form-control input-md"
                                        wire:model="slug">
                                        @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">ٍShort Description</div>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Short Description" wire:model="short_description"></textarea>
                                    @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Description</div>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Description" wire:model="description"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Regular price</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Regular price" class="form-control input-md"
                                        wire:model="regular_price">
                                        @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Sale price</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale price" class="form-control input-md"
                                        wire:model="sale_price">
                                        @error('sale_price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">SKU</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md"
                                        wire:model="SKU">
                                        @error('SKU')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Stock Status</div>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">InStock</option>
                                        <option value="outofstock">Out Of Stock</option>
                                    </select>
                                    @error('stock_status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Featured</div>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Quantity</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantity" class="form-control input-md"
                                        wire:model="quantity">
                                        @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Product Image</div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control input-md" wire:model="newImage">
                                    @if ($newImage)
                                        <img src="{{ $newImage->temporaryUrl() }}" width="120">
                                    @else
                                        <img src="{{ asset('assets/images/products') }}/{{ $image }}" width="120">
                                    @endif
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Category</div>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select Categoty</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
