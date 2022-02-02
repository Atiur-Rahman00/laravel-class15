@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h2>Role add form</h2>
                    
                </div>
                <div class="card-body">
                @if(session('inserr'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('inserr') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                    <form action="{{ url('/role/add') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class = "form-control" name= "role">
                            @error ('role')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                           <button type="submit" class = "btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
        <div class="card">
                <div class="card-header">
                    <h2>Role List</h2>
                </div>
                <div class="card-body">
                   <table class="table table-bordered table-responsive">
                       <thead>
                            <th>sl</th>
                            <th>role</th>
                            <th>status</th>
                            <th>creatated_at</th>
                            <th>action</th>
                       </thead>
                       <tbody>
                            @forelse ($all_role as $role)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $role->role }}</td>
                                    <td>{{ $role->status }}</td>
                                    <td>{{ $role->created_at ->format('d-M-Y') }}</td>
                                    <td>-</td>                              
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