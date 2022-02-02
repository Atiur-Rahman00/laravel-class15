@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
        <div class="card">
                <div class="card-header">
                    <h2>Category List</h2>
                </div>
                <div class="card-body">
                   <table class="table table-bordered table-responsive">
                       <thead>
                            <th>sl</th>
                            <th>category_name</th>
                            <th>status</th>
                            <th>added by</th>
                            <th>creatated_at</th>
                            <th>action</th>
                       </thead>
                       <tbody>
                            @forelse ($all_categories as $categories)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $categories->category_name }}</td>
                                    <td>
                                        @if($categories->status == 1)
                                        <span class="badge bg-success">active</span>
                                        @else
                                        <span class="badge bg-warning">de-active</span>
                                        @endif
                                    </td>
                                    <td>{{ $categories->relationtouser->name }}</td>
                                    <td>{{ $categories->created_at ->format('d-M-Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/category/edit') }}/{{$categories->id}}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ url('/category/delete') }}/{{$categories->id}}" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </td>                              
                                 </tr>
                                 @empty
                                 <td class="text-danger text-center" colspan="10">No data added yet</td>
                            @endforelse
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection