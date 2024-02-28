@extends('layout.home')
@section('content')
    <div class="container">
        <h5 class="text-center p-4">List Teams</h5>
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
                            <th scope="col">ID_Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($listTeam))
                            @foreach ($listTeam as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('TeamList', ['id' => isset($item) ? $item->team_id : '']) }}">
                                            {{ $item->team_id }}</a>
                                    </td>
                                    <td>{{ $item->team_name }}</td>
                                    <td>{{ $item->department_id }}</td>
                                </tr>
                            @endforeach
                        @else
                            <h4 class="text-danger">Data not isset</h4>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID_team</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{ isset($getOneTeam) ? $getOneTeam->team_id : '' }}" placeholder="Enter IDTeam"
                            name="team_id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name_team</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="TeamName..."
                            value="{{ isset($getOneTeam) ? $getOneTeam->team_name : '' }}" name="team_name">
                    </div>
                    <div class="form-group">
                        <select name="department_id" class="form-control" id="exampleInputPassword1">\

                            @if (isset($listDepartment))
                                <option value="{{ isset($getOneTeam) ? $getOneTeam->department_id : '' }}">
                                    {{ isset($getOneTeam) ? $getOneTeam->department_id : '' }}</option>
                            @endif
                        </select>
                    </div>
                    <a href="{{ route('CreateTeam') }}" class="btn bg-primary text-white" href="">Add</a>
                    <a href="{{ route('editTeam', ['id' => isset($getOneTeam) ? $getOneTeam->team_id : '']) }}"
                        class="btn bg-primary text-white" href="">Edit</a>
                    <button type="submit" onclick="return confirm('Have you delete team?')"
                        class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
