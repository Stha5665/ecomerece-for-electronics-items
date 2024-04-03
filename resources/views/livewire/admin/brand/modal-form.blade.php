    <!-- Using livewire modal so we have to ignore -->
    <!-- it ignores the default action of modal like it closes on save button -->

    <div wire:ignore.self class="modal fade" id="addBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Brands</h1>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand()">
                <div class="modal-body">

                    <div class="mb-3">
                        <label>
                            Select category
                        </label>
                            <select wire:model.defer="category_id"  required class="form-control">
                                <option value="">--Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        @error('category_id') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="mb-3">
                        <label >
                            Brand Name
                        </label>

                        <!-- Defers syncing the input with the Livewire property until an "action" is performed. This saves drastically on server roundtrips -->
                        <input type="text"  wire:model.defer="name" class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="mb-3">
                        <label >
                            Brand Slug
                        </label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') <small class="text-danger">{{$message}}</small>@enderror

                    </div>
                    <div class="mb-3">
                        <label >
                            Status
                        </label>
                        <input type="checkbox" wire:model.defer="status" /> Checked=Hidden, Unchecked = visible
                        @error('status') <small class="text-danger">{{$message}}</small>@enderror

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>


    <!-- Brand Update Modal -->

    <div wire:ignore.self class="modal fade" id="updateBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Brands</h1>
                    <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div wire:loading class="p-2">

                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>Loading...
                </div>
                <div wire:loading.remove>

                    <form wire:submit.prevent="updateBrand">
                        <div class="modal-body">

                            <div class="mb-3">
                                <label>
                                    Select category
                                </label>
                                    <select wire:model.defer="category_id"  required class="form-control">
                                        <option value="">--Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                @error('category_id') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="mb-3">
                                <label >
                                    Brand Name
                                </label>

                                <!-- Defers syncing the input with the Livewire property until an "action" is performed. This saves drastically on server roundtrips -->
                                <input type="text"  wire:model.defer="name" class="form-control">
                                @error('name') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="mb-3">
                                <label >
                                    Brand Slug
                                </label>
                                <input type="text" wire:model.defer="slug" class="form-control">
                                @error('slug') <small class="text-danger">{{$message}}</small>@enderror

                            </div>
                            <div class="mb-3">
                                <label >
                                    Status
                                </label>
                                <input type="checkbox" wire:model.defer="status" style="width:70px;"/> Checked=Hidden, Unchecked = visible
                                @error('status') <small class="text-danger">{{$message}}</small>@enderror

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


                


    <!-- Delete Modal -->

    <div wire:ignore.self class="modal fade" id="deleteBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Brand</h1>
                    <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div>

                    <form wire:submit.prevent="destroyBrand">
                        <div class="modal-body">
                            <h4>Are you sure you want to delete this data ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes!! Delete</button>
                        </div>
                    </form>
                            
                </div>
   
            </div>
        </div>
    </div>
