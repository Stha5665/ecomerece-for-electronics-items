@extends('layouts.admin')
@section('content')

            <div class="row">
               <div class="col-md-12 ">
                    @include('admin.message.success')
                   <div class="card">
                       <div class="card-header">
                           <h3>Add Color
                               <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm float-right">Back</a>
                           </h3>
                       </div>
                       <div class="card-body">
                       <form action="{{url('admin/colors/create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label >Color Name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name') 
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                               
                            </div>
                            <div class="mb-3">
                                <label >Color Code</label>
                                <input type="text" name="code" class="form-control">
                                @error('code') 
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                               
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