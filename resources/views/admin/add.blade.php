@extends('layouts.admin')
@section('content')

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)


            <div class="alert alert-danger">
                {{$error}}
            </div>


        @endforeach
    @endif

    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text"  name="name" class="form-control"  placeholder="Name Of product">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">description</label>
            <textarea name="description" class="form-control" cols="30" rows="10">
            </textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Type</label>
            <input type="text" name="type"  class="form-control"  placeholder="type">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="text" name="price"  class="form-control"  placeholder="Price">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">File</label>
            <input type="file" name="image" class="form-control"  placeholder="type">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop