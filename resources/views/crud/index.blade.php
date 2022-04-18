<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries List</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
</head>

<body>


    {{-- container --}}
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-8">
                {{-- select by id --}}
                <form action="" method="get" id="add-name-form" autocomplete="off">
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $i)
                            <option value="{{ $i->id }}" @if ($choice == $i->id) selected @endif>
                                {{ $i->id }}</option>
                        @endforeach
                        <option value="0">all</option>
                    </select>

                    <input type="text" name="name" id="" class="form-control" value="{{ $input_name }}">
                    <input type="text" name="unit_price" id="" class="form-control" value="{{ $input_price }}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">SAVE</button>
                    </div>
                </form>



                <div class="card">
                    <div class="card-header">CATEGORY</div>
                    <div class="card-body">
                        <table class="table table-hover table-condensed" id="counties-table">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Actions <button class="btn btn-sm btn-danger d-none" id="deleteAllBtn">Delete
                                        All</button></th>
                            </thead>
                            <tbody>
                                @foreach ($items as $i)
                                    <tr>
                                        <td><a href="{{ route('detail', ['id' => $i->id]) }}">
                                                {{ $i->id }}
                                            </a></td>
                                        <td>{{ $i->item_name }}</td>
                                        <td>{{ $i->unit_price }}</td>
                                        <td>{{ $i->category_id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add new RECORD</div>
                    <div class="card-body">
                        <form action="{{ route('add') }}" method="post" id="add-name-form" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name"
                                    value="{{ old('name') }}">
                                <span class="text-danger error-text country_name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter email"
                                    value="{{ old('price') }}">
                                <span class=" text-danger error-text capital_city_error"></span>
                            </div>
                            <div class="form-group">

                                <label for="">category</label>
                                <select name="cate">
                                    @foreach ($categories as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                    {{-- <input type="text" class="form-control" name="cate" placeholder="Enter email"
                                    value="{{ 'cate' }}">
                                <span class=" text-danger error-text capital_city_error"></span> --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-success">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>


</body>

</html>
