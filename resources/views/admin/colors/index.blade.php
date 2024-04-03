@extends('layouts.admin')
@section('content')

            <div class="row">
               <div class="col-md-12 ">
                    @include('admin.message.success')
                   <div class="card">
                       <div class="card-header">
                           <h3>Colors List
                               <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm float-right">Add Colors</a>
                           </h3>
                       </div>
                       <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($colors as $color)
                                    <tr>
                                        <td>{{$color->id}}</td>
                                        <td>{{$color->name}}</td>
                                        <td>{{$color->code}}</td>
                                        <td>{{$color->status ? 'Hidden': 'Visible' }}</td>
                                        <td>
                                            <a href="{{url('admin/colors/'.$color->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{url('admin/colors/'.$color->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <td colspan="5">No Colors Available</td>
                                  
                                    @endforelse
                                </tbody>
                            </table>
                       </div>
                    </div>
                </div>
            </div>

                                       
@endsection