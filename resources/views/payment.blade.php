@extends('layout.plain')
@section('content')

<div class="d-flex flex-column" style="background-color: white; max-width:1000px; width:100%; height:650px; padding:20px; border-radius: 20px">

    <h6>Invoice Number : {{ session('last_invoice_number') + 1  }}</h6>
    <br>
    <h6>Destination : {{ session('user_address')}}</h6>
    <p>Postal Code : {{ session('user_pos')}}</p>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Category</th>
            <th scope="col">Product</th>
            <th scope="col">Qty</th>
            <th scope="col">@</th>
            <th scope="col">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        <form action="{{ route('invoice.saved')}}" method="POST">
            @csrf
            @php
                $total = 0;
            @endphp

            @foreach ($basketThings as $index => $item)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->quantity}}</td>
                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</td>
                </tr>
                @php
                    $total += $item->quantity * $item->price
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="float-right">Total</td>
                <td class="float-right">Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
    <br><br>
    <div class="d-flex justify-content-center">
        <a href="{{route('user.data')}}" class="btn btn-secondary me-3">Back</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>


    </form>

</div>
@endsection
