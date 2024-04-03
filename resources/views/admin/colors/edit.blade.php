@extends('layouts.admin')
@section('content')

            <div class="row">
               <div class="col-md-12 ">
                   <div class="card">
                       <div class="card-header">
                           <h3>Edit Color
                               <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm float-right">Back</a>
                           </h3>
                       </div>
                       <div class="card-body">
                       <form action="{{url('admin/colors/'.$color->id.'/update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label >Color Name</label>
                                <input type="text" name="name" class="form-control" value="{{$color->name}}">
                                @error('name') 
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                               
                            </div>
                            <div class="mb-3">
                                <label >Color Code</label>
                                <input type="text" name="code" class="form-control" value="{{$color->code}}">
                                @error('code') 
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                               
                            </div>
                            <div class="mb-3">
                                <label >Status</label> <br>
                                <input type="checkbox" name="status" style="width: 30px; height: 30px"  {{$color->status ? 'checked':''}}>Checked=Hidden, Unchecked=Visible
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary"> Update</button>
                            </div>
                        </form>
                       </div>
                    </div>
                </div>
            </div>

                                       
@endsection