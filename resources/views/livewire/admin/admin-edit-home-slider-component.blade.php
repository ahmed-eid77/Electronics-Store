<div>
    <div class="container" style="padding: 30px 0px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Slide
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.homeslider') }}" class="btn btn-success pull-right">All Slides</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent='updateSlide()'>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Title</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="title" class="form-control input-md"
                                        wire:model="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Subtitle</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Subtitle" class="form-control input-md"
                                        wire:model="subtitle">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Price</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Price" class="form-control input-md"
                                        wire:model="price">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Link</div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Link" class="form-control input-md"
                                        wire:model="link">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">Image</div>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newImage">
                                    @if ($newImage)
                                        <img src="{{ $newImage->temporaryUrl() }}" width="120">
                                    @else
                                        <img src="{{ asset('assets/images/sliders') }}/{{ $image }}" width="120">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 control-label">status</div>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 control-label"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
