@extends('layouts.app')
@section('content1')
    @if (isset($user))
        <div class="card-header">
            Update Task
        </div>
        <div class="card-body">
            <!-- Update Task Form -->
            <form action="{{ url('updateUser') }}" method="POST">
                @csrf
                <input type="hidden" name="userId" value="{{ $user->id }}">
                <!-- Task Name -->
                <div class="mb-3">
                    <label for="user-email" class="form-label">User</label>
                    <input type="email" name="userEmail" id="user-email" class="form-control"
                        value="{{ $user->email }}">
                </div>

                <!-- Add Task Button -->
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>Update User
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="card-header">
            New User
        </div>
        <div class="card-body">
            <!-- New Task Form -->
            <form action="createUser" method="POST">
                @csrf
                <!-- Task Name -->
                <div class="mb-3">
                    <label for="user-email" class="form-label">User</label>
                    <input type="text" name="userEmail" id="user-email" class="form-control" value="">
                </div>

                <!-- Add Task Button -->
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>Add User
                    </button>
                </div>
            </form>
        </div>
    @endif
@endsection

@section('content2')
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->email }}</td>
            <td>
                <form action="/deleteUser/{{ $user->id }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash me-2"></i>Delete
                    </button>
                </form>
                <form action="/editUser/{{ $user->id }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-info">
                        edit
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection
