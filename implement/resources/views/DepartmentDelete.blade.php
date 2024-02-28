@extends('layout.home')
@section('content')
    <div class="container">
        <h5 class="text-center p-4">Delete Department</h5>
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
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            value="{{ isset($getOne) ? $getOne->department_id : '' }}" aria-describedby="emailHelp"
                            placeholder="Enter DepartmentId..." name="department_id">
                        @error('department_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">DepartmentName</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ isset($getOne) ? $getOne->department_name : '' }}"
                            placeholder="Enter DepartmentName..." name="department_name">
                        @error('department_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Descriptions</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ isset($getOne) ? $getOne->descriptions : '' }}" placeholder="Enter Descriptions..."
                            name="descriptions">
                        @error('descriptions')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" onclick="return confirm('have you Delete department?')"
                        class="btn btn-primary">Delete</button>
                    <a href="{{ route('getDepartment') }}" class="btn btn-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
