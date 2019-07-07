@extends('layouts.admin')
@section('content')


    <img width="180" height="180" src="{{asset('storage/images/'.$product->image)}}" alt="">

    <form method="POST" action="{{ route('admin.Image.update',$product->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="exampleInputEmail1">File</label>
            <input type="file" name="image" class="form-control"  placeholder="type">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop