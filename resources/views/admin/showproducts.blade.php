@extends('layouts.admin')
@section('content')
<div class="table-responsive">

    @if(Session::has('msg'))
        {{Session::get('msg')}}
    @endif
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>#id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Type</th>
            <th>Price</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)

        <tr>
            <td>{{$product->id}}</td>
            <td><img src="{{asset('storage/images/'.$product->image)}}"
                     alt=""
                     width="100" height="100"
                     style="max-height:220px" ></td>

            <td><a href="{{ url('admin/products/edit/'.$product->id) }}">{{ $product->name }}</a></td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->type }}</td>
            <td>{{ $product->price }}</td>
            <td>

                <form action="{{ route('admin.delete',$product->id) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-warning">Remove</button>

                </form>
            </td>


        </tr>

        @endforeach

        </tbody>
    </table>

    {{ $products->links() }}
</div>
@stop