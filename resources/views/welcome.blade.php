<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-5">
        <div class="row text-center m-3">
            <h1>Code Challenge</h1>
        </div>
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <form method="get" action="{{route('customer.filter')}}">
            <div class="row  justify-content-around" style="width:100%">
                <div class="col text-center">
                    <select name="country" class="form-control">
                        <option value="" disabled selected>Select country</option>
                        <option value="(237)">Camerron</option>
                        <option value="(251)">Ethiopia</option>
                        <option value="(212)">Morroco</option>
                        <option value="(258)">Mozambique</option>
                        <option value="(256)">Uganda</option>
                    </select>
                </div>
                <div class="col text-center">
                    <select name="status" class="form-control">
                        <option value="" disabled selected>Select status</option>
                        <option value="1">Valid</option>
                        <option value="0">invalid</option>
                    </select>
                </div>
                <div class="col text-center ">
                    <button type="submit" class="btn btn-success" style="width:100%">Filter</button>
                </div>
                <div class="col text-center ">
                    <a href="/" class="btn btn-primary" style="width:100%">Clear all</a>
                </div>
            </div>
        </form>
        @if($validatedCurstomers)
        <div class="row m-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Country</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($validatedCurstomers as $customer)
                    <tr style="cursor:pointer">
                        <th scope="row">{{$customer->id ?? ''}}</th>
                        <td>{{$customer->name ?? ''}}</td>
                        <td>{{$customer->phone ?? ''}}</td>
                        <td>{{$customer->country ?? ''}}</td>
                        <td>
                            @if($customer->isValid)
                            Valid
                            @else
                            Invalid
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br />
            <br />
            {{$validatedCurstomers->withQueryString()->links() }}
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>