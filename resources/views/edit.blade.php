@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('update', ['id' => $task->id])}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Task name</label>
              <input type="text" class="form-control" name="name" value="{{$task->name}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Priority</label>
              <input type="text" class="form-control" name="priority" value="{{$task->priority}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>

@endsection