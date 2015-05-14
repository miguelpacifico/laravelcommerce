@extends('app')

@section('content')

    <div class="container">
        <h1>Products</h1>
        <br/> <br/>
        <a href="{{ route('products.create')  }}" class="btn btn-default">Create Product</a>
        <br/> <br/>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Featured</th>
                <th>Recommend</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ str_limit($product->description,$limit = 50, $send = " ...") }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        @if($product->featured == "0")
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        @elseif($product->featured == "1")
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        @endif
                    </td>
                    <td>
                        @if($product->recommend == "0")
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        @elseif($product->recommend == "1")
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit',['id'=>$product->id])  }}" class="btn bg-warning">Edit</a>
                        <a href="{{ route('products.destroy',['id'=>$product->id])  }}" class="btn bg-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>

        {!! $products->render() !!}
    </div>
@endsection