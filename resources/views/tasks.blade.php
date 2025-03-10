    @extends('layouts.app')
    @section('content1')
        @if (isset($task))
            <div class="card-header">
                Update Task
            </div>
            <div class="card-body">
                <!-- Update Task Form -->
                <form action="{{ url('updateTask') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $task->id }}">
                    <!-- Task Name -->
                    <div class="mb-3">
                        <label for="task-name" class="form-label">Task</label>
                        <input type="text" name="name" id="task-name" class="form-control"
                            value="{{ $task->name }}">
                    </div>

                    <!-- Add Task Button -->
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Update Task
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="card-header">
                New Task
            </div>
            <div class="card-body">
                <!-- New Task Form -->
                <form action="createTask" method="POST">
                    @csrf
                    <!-- Task Name -->
                    <div class="mb-3">
                        <label for="task-name" class="form-label">Task</label>
                        <input type="text" name="name" id="task-name" class="form-control" value="">
                    </div>

                    <!-- Add Task Button -->
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Add Task
                        </button>
                    </div>
                </form>
            </div>
        @endif
    @endsection

    @section('content2')
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>
                    <form action="/deleteTask/{{ $task->id }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash me-2"></i>Delete
                        </button>
                    </form>
                    <form action="/editTask/{{ $task->id }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-info">
                            edit
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endsection
