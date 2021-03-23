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
            <form action="{{ route('tasks.update', $task['id']) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name="task" value="{{ $task['title'] }}">
                </div>
                <hr />
                <div class="form-group">
                    <input type="submit" value="Изменить" class="btn btn-secondary">
                    <a href="{{ URL::previous() }}" class='btn btn-outline-dark'>Back</a>
                </div>


            </form>
        </div>

    </div>
@endsection
