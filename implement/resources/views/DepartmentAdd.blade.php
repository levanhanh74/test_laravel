@extends('layout.home')
@section('content')
    <div class="container">
        <h5 class="text-center p-4">Add Department</h5>
        @if (session('mess'))
            <h2 class="text-success">{{ session('mess') }}</h2>
        @endif
        <div class="row m-5 ">
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID_team</th>
                            <th scope="col">Name_team</th>
                            <th scope="col">Descriptions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($listDepartment))
                            @foreach ($listDepartment as $item)
                                <tr>
                                    <a href="{{ route('getDepartment', ['id' => $item->department_id]) }}">
                                        <td>{{ $item->department_id }}</td>
                                        <td>{{ $item->department_name }}</td>
                                        <td>{{ $item->descriptions }}</td>
                                    </a>
                                </tr>
                            @endforeach
                        @else
                            <h3 class="text-danger">Dữ liệu không tồn tại</h3>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">DepartmentId</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter DepartmentId..." name="department_id">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">DepartmentName</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter DepartmentName..." name="department_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Descriptions</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Descriptions..." name="descriptions">
                    </div>

                    <button onclick="return confirm('Ban co muon Add Department nay khong?')" type="submit"
                        class="btn btn-primary">Submit</button>
                    <a href="{{ route('getDepartment') }}" class="btn btn-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
