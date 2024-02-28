@extends('layout.home')
@section('content')
    <div class="container">
        <h5 class="text-center p-4">Delete Department</h5>

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
                                    <td> {{ $item->team_id }} </td>
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
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID_team</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{ isset($getOneTeam) ? $getOneTeam->team_id : '' }}" placeholder="Enter ID_team..."
                            name="team_id">
                        @error('team_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name_team</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name_team..."
                            value="{{ isset($getOneTeam) ? $getOneTeam->team_name : '' }}" name="team_name">
                        @error('team_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="department_id" class="form-control" id="exampleInputPassword1">
                            <option value="{{ isset($getOneTeam) ? $getOneTeam->department_id : '' }}">
                                {{ isset($getOneTeam) ? $getOneTeam->department_id : '' }}
                            </option>
                            @if (isset($listDepartment))
                                @foreach ($listDepartment as $item)
                                    <option value="{{ $item->department_id }}">{{ $item->department_id }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" onclick="return confirm('Have you Delete?')"
                        class="btn btn-primary">Delete</button>
                    <a class="btn bg-primary text-white" href="{{ route('TeamList') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
