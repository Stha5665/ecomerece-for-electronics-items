@extends('layouts.admin')
@section('content')

            <div class="row">
               <div class="col-md-12 ">
                    @include('admin.message.success')
                   <div class="card">
                       <div class="card-header">
                           <h3>Add Slider
                               <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm float-right">Back</a>
                           </h3>
                       </div>
                       <div class="card-body">
                       <form action="{{url('admin/sliders/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label >Slider Title</label>
                                <input type="text" name="title" class="form-control">
                                @error('title') 
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                               
                            </div>
                            <div class="mb-3">
                                <label >Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                                @error('description') 
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                               
                            </div>
                            <div class="mb-3">
                                <label >Image</label> <br>
                                <input type="file" name="image" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label >Status</label> <br>
                                <input type="checkbox" name="status" style="width: 30px; height: 30px" >Checked=Hidden, Unchecked=Visible
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary"> Save</button>
                            </div>
                        </form>
                       </div>
                    </div>
                </div>
            </div>

                                       
@endsection