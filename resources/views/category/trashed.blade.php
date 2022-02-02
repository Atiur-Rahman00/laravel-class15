@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
        <div class="card">
                <div class="card-header">
                    <h2>Deleted Category List</h2>
                </div>
                <div class="card-body">

                    @if(session('fordlt'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('fordlt') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session('restoredone'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('restoredone') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                   <table class="table table-bordered table-responsive">
                       <thead>
                            <th>sl</th>
                            <th>category_name</th>
                            <th>action</th>
                       </thead>
                       <tbody>
                            @forelse ($all_trashed as $trashed_category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $trashed_category->category_name }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/category/restore') }}/{{ $trashed_category->id }}" class="btn btn-warning btn-sm">Restore</a>
                                            <a href="{{ url('/category/vanish') }}/{{$trashed_category->id}}" class="btn btn-danger btn-sm">Delete</a>
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