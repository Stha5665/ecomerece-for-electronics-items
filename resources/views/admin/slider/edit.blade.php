@extends('layouts.admin')
@section('content')

            <div class="row">
               <div class="col-md-12 ">
                    @include('admin.message.success')
                   <div class="card">
                       <div class="card-header">
                           <h3>Edit Slider
                               <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm float-right">Back</a>
                           </h3>
                       </div>
                       <div class="card-body">
                       <form action="{{url('admin/sliders/'.$slider->id.'/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT');

                            <div class="mb-3">
                                <label >Slider Title</label>
                                <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                                @error('title') 
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                               
                            </div>
                            <div class="mb-3">
                                <label >Description</label>
                                <textarea name="description" class="form-control" rows="3">{{$slider->description}}</textarea>
                                @error('description') 
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                               
                            </div>
                            <div class="mb-3">
                                <label >Image</label> <br>
                                <input type="file" name="image" class="form-control"/>
                                <a href="{{url($slider->image)}}">
                                    <img src="{{asset("$slider->image")}}" alt="" style="width: 90px; height:90px;">
                                </a>
                            </div>
                            <div class="mb-3">
                                <label >Status</label> <br>
                                <input type="checkbox" name="status" style="width: 30px; height: 30px" {{$slider->status ? 'checked':''}}>Checked=Hidden, Unchecked=Visible
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary"> update</button>
                            </div>
                        </form>
                       </div>
                    </div>
                </div>
            </div>

                                       
@endsection