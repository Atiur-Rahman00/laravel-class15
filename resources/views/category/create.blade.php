@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Category add form</h2>
                    
                </div>
                <div class="card-body">

                @if(session('inserr'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('inserr') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('insdone'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('insdone') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                    <form action="{{ url('/category/store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class = "form-control" name= "category_name" placeholder="Enter category name">
                            @error ('category_name')
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
    </div>
</div>


@endsection