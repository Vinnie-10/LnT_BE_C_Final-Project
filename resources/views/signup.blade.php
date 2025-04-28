<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body style="background-color: #92CCED">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-white p-5 rounded shadow" style="min-width: 300px; width: 100%; max-width: 400px;">
            <h2 class="mb-4 text-center fw-bold">Sign Up</h2>

            <form method="POST" action="{{route('signup')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Your Full Name" value="{{old('name')}}"required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhoneNumber" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" id="exampleInputPhoneNumber" placeholder="Your Phone Number" value="{{old('phone_number')}}" required>
                    @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@gmail.com" value="{{old('email')}}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
</body>
</html>
