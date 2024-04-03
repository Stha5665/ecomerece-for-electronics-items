@extends('layouts.admin')
@section('content')

            <div class="row">
               <div class="col-md-12 ">
                    @include('admin.message.success')
                   <div class="card">
                       <div class="card-header">
                           <h3>Slider List
                               <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm float-right">Add Slider</a>
                           </h3>
                       </div>
                       <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->description}}</td>
                                        <td>
                                            <img src="{{url($slider->image)}}" style="width:70px; height: 70px;" alt="Slider">
                                        </td>
                                        <td>{{$slider->status ? 'Hidden': 'Visible' }}</td>
                                        <td>
                                            <a href="{{url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{url('admin/sliders/'.$slider->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <td colspan="6">No sliders Available</td>
                                  
                                    @endforelse
                                </tbody>
                            </table>
                       </div>
                    </div>
                </div>
            </div>

                                       
@endsection