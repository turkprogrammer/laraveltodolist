@extends('layouts.app')
@section('title', 'ToDo List App')
@section('content')

    <div class="container col-md-8">
        <div class="row">
            <h1>ToDo List App</h1>
        </div>
        <!--  Succes -->
        @if (Session::has('success'))
            <div class="alert alert-success">
                <strong>Success: </strong> {{ Session::get('success') }}
            </div>
        @endif
        <!-- Succes -->
        <!-- Errors -->
        @if (count($errors) > 0)

            <div class="alert alert-danger">
                <strong>Error:</strong>

                <ul>
                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Errors -->

        <div class="row">
            <form action="{{ route('tasks.store') }}" method="post">
                @csrf

                <div class="input-group input-group-lg">


                    <input type="text" class="form-control " placeholder="Add yours task" name="task">

                    <button type="submit" class="btn btn-info"> <i class="fas fa-tasks"></i> Add Task</button>

                </div>
            </form>
        </div>
        @if (count($tasks) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Task #</th>

                        <th>Title</th>

                        <th>Edit</th>

                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks as $task)
                        <tr>

                            <th>{{ $task['id'] }}</th>

                            <td>{{ $task['title'] }}</td>

                            <td><a href="{{ route('tasks.edit', $task['id']) }}" class="btn btn-secondary"><i class="far fa-edit"></i></td>

                            <td>
                                <form action="{{ route('tasks.destroy', $task['id']) }}" method="post" class="c2">
                                    @csrf @method('DELETE') <button type="submit" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div class="text-center">
            {{ $tasks->links() }}
        </div>
    </div>

@endsection
