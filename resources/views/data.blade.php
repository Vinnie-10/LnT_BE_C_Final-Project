@extends('layout.plain')
@section('content')

<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <h1 class="text-center mb-4">Fill in your data😊</h1>
    <div class="form-container">
        <div class="card p-5">
            @if($errors->has('address'))
                <div class="alert alert-danger">
                    {{ $errors->first('address') }}
                </div>
            @endif
            @if($errors->has('pos'))
                <div class="alert alert-danger">
                    {{ $errors->first('pos') }}
                </div>
            @endif
            <form action="{{ route('data.saved')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control" id="address" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="pos" class="form-label">Postcode</label>
                    <input type="text" name="pos" class="form-control" id="pos">
                    <br>
                </div>
                <a href="{{route('view.basket')}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary d-inline ms-2">Confirm</button>
            </form>
        </div>
    </div>
</div>
@endsection
