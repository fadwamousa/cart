@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Hi , {{Auth::user()->name}}</p>
                    <p>Your Email Is {{Auth::user()->email}}</p>




                        <a href="{{ route('products')}}"  class="btn btn-warning">Main Website</a>

                        @if($userData->isAdmin())
                            <a href="{{ route('admin.products')}}" class="btn btn-primary">Admin Dashboard</a>
                        @else
                            <div class="btn btn-primary">You are not an admin</div>

                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
