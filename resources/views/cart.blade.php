@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Gio hang cua ban
    </div>

    <div class="row">
        @if(!isset($carts) || count($carts) === 0)
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else

        <!-- Nếu biến $products tồn tại thì hiển thị sản phẩm -->
            @foreach($carts as $key=>$product)
                <div class="col-4">
                    <div class="card text-left" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['id'] }}</h5>
                            <p class="card-text">{{ $product['name'] }}</p>
                            <p><img src="{{ asset("storage/".$product['img'])}}" width="80" height="80"></p>
                            <p class="card-text text-dark">${{ $product['price'] }}</p>
                            <p><a href="#">Huy</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
        <p><a href="{{route('index')}}">Tiep tuc mua hang</a></p>
@endsection