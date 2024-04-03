@extends('layouts.admin')
@section('content')

        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Product
                            <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-right">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                    @endif
                    @include('admin.message.success')

                        <form action="{{url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            @method('PUT')
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                        Home
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                        SEO Tags
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                        Details
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                        Product Image
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                        Product Colors
                                    </button>
                                </li>
                                
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected': '' }} >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label >Product Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$product->name}}"/>
                                        @error('name') 
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label >Product Slug</label>
                                        <input type="text" name="slug" class="form-control" value="{{$product->slug}}"/>
                                        @error('slug') 
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label>Select Brand</label>
                                        <select name="brand" class="form-control">
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->name}}" {{$brand->name == $product->brand?'selected':''}}>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label >Small Description(500 words)</label>
                                        <textarea name="small_description" class="form-control" rows="4">{{$product->small_description}}</textarea>
                                        @error('small_description') 
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label >Description</label>
                                        <textarea name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                                        @error('description') 
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade border p-3 " id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label >Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{$product->meta_title}}"/>
                                        @error('meta_title') 
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label >Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="4">{{$product->meta_description}}</textarea>
                                        @error('meta_description') 
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label >Meta Key</label>
                                        <textarea name="meta_keyword" class="form-control" rows="4">{{$product->meta_keyword}}</textarea>
                                        @error('meta_keyword') 
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade border p-3 " id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label> Original Price</label>
                                                <input type="text" name="original_price" class="form-control" value="{{$product->original_price}}" />
                                                @error('original_price') 
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label> Selling Price</label>
                                                <input type="text" name="selling_price" class="form-control" value="{{$product->selling_price}}" />
                                                @error('selling_price') 
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label> Quantity</label>
                                                <input type="number" name="quantity" class="form-control" value="{{$product->quantity}}" />
                                                @error('quantity') 
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label> Trending</label>
                                                <input type="checkbox" name="trending" {{$product->trending== '1' ? 'checked':''}} style="width: 30px; height: 30px;"/>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label> Status</label>
                                                <input type="checkbox" name="status" {{$product->status== '1' ? 'checked':''}} style="width: 30px; height: 30px;"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade border p-3 " id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                     
                                    <div class="mb-3">
                                        <label>Upload Product Images</label>
                                        <input type="file" name="image[]" multiple class="form-control" />
                                     </div> 
                                     <div>
                                        
                                        @if($product->productImages)
                                        <div class="row">
    
                                            @foreach($product->productImages as $image)
                                            <div class="col-md-2">

                                                <a href="{{url(asset($image->image))}}"><img src="{{asset($image->image) }}" style="width:80px; height:80px;" class="me-4 border" alt="Img"></a>
                                                <a href="{{ url('admin/product-image/'.$image->id.'/delete')}}" class="d-block" >Remove</a>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                        <h5>No Image Added</h5>
                                        @endif
                                     </div>                          
                                </div>

                                <div class="tab-pane fade border p-3 " id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                     
                                     <div class="mb-3">
                                        <h4>Add Product Color: </h4>
                                        <label> Select Color </label>
                                        <div class="row">
                                            @forelse($colors as $color)
                                            <div class="p-2 border mb-3">
                                                Color:<input type="checkbox" name="colors[{{$color->id}}]" style="width: 20px; height: 20px;" value="{{$color->id}}" /> {{$color->name}}
                                                <br>
                                                Quantity: <input type="number" name="colorQuantity[{{$color->id}}]" style="width:70px; border:1px solid;" >
                                            
                                            </div>
          
                                            @empty
                                            <h1>No Colors Found</h1>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm ">
                                            <thead>
                                                <tr>
                                                    <th>Color Name</th>
                                                    <th>Quantity</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- getting colors of that product from product_colors table -->
                                                @foreach($product->productColors as $productColor )

                                                <tr class="product-color-tr">
                                                    <td>
                                                    @if($productColor->color)
                                                    {{$productColor->color->name}}
                                                    @else
                                                    No color Found
                                                    @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width:150px">
                                                            <input type="text" value="{{$productColor->quantity}}" class=" ProductColorQty form-control form-control-sm">
                                                            <button type="button" value="{{$productColor->id}}" class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{$productColor->id}}" class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div><button type="submit" class="btn btn-primary">Update</button></div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    @endsection

    @section('scripts')

    <script>
        $(document).ready(function(){

            // while sending ajax request you have to send csrf token
            $.ajaxSetup({
                // headers search for csrf token in the meta tag
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.updateProductColorBtn', function(){
                var product_id = "{{$product->id}}";
                var product_color_id = $(this).val();
                var qty = $(this).closest('.product-color-tr').find('.ProductColorQty').val();

                if(qty <= 0){
                    alert('Quantity is required and  should be greater than 0');
                    return false;
                }

                var data = {
                    'product_id' : product_id,
                    'qty' : qty
                };

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + product_color_id,
                    data:data,
                    success: function(response){
                        alert(response.message);
                    }

                });
            });

            $(document).on('click', '.deleteProductColorBtn', function(){
                if(confirm('Are you sure, you want to delete this data?')){

                    var product_color_id = $(this).val();
                    var thisClick = $(this);
    
                    $.ajax ({
                        type: "GET",
                        url: "/admin/product-color/" + product_color_id + "/delete",
                        success: function(response){
                            thisClick.closest('.product-color-tr').remove();
                            alert(response.message);
                        }
                    });
                }
            });
        });
    </script>
    @endsection

