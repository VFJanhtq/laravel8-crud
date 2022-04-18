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

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Update Detail</div>
            <div class="card-body">
                <form action="{{ route('update') }}" method="post">
                    <input type="hidden" name="cid" value="{{ $detail_item->id }}">
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
                        <label for="">Category_id</label>
                        <input type="text" class="form-control" name="cate" placeholder="Category id"
                            value="{{ old('cate') }}">
                        <span class=" text-danger error-text capital_city_error"></span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- container --}}
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-8">
                {{-- select by id --}}
                <div class="card">
                    <div class="card-header">Detail Item</div>
                    <div class="card-body">
                        <table class="table table-hover table-condensed" id="counties-table">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>FRO_ID</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $detail_item->id }}</td>
                                    <td>{{ $detail_item->item_name }}</td>
                                    <td>{{ $detail_item->unit_price }}</td>
                                    <td>{{ $detail_item->category_id }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('delete', ['id' => $detail_item->id]) }}"
                                                class="btn btn-danger btn-xs">Delete</a>

                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
