@extends('layout.plain')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center py-5">
    <h1 class="text-center mb-4">🛒Your Basket</h1>
    <div class="form-container">
        <div class="card p-5">

            @php
                $basket = session('basket');
                if (!is_array($basket)) {
                    $basket = [];
                }
            @endphp

            @if (empty($basket))
                <p class="text-center">Your basket is empty.</p>
            @else
                @foreach ($basket as $productId => $product)
                @php
                    if (!is_array($product) || !isset($product['name'], $product['price'], $product['quantity'], $product['image'])) {
                        continue;
                    }
                @endphp

                <div class="d-flex align-items-center" style="border-bottom: 1px solid black; padding-bottom: 10px;">
                    <img src="{{ asset('/storage/' . $product['image']) }}" alt="{{ $product['name'] }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; margin-right: 20px;">

                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <h5>{{ $product['name'] }}</h5>
                            <span class="text-muted" style="white-space:nowrap">x{{ $product['quantity'] }}</span>
                        </div>
                        <p class="mb-0">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                    </div>
                </div>
                <br>
                @endforeach
                <a href="{{route('user.data')}}" class="btn btn-primary">Buy now</a>
                <br>
            @endif

            <div class="d-flex justify-content-center gap-4">
                <a href="{{route('user.page')}}" class="btn btn-secondary">Return to home</a>
            </div>
        </div>
@endsection
