@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 2rem;">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create task
  </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('store')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Task name</label>
                  <input type="text" class="form-control" name="name">
                  <div id="taskHelp" class="form-text">E.g Take out the trash</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Priority</label>
                  <input type="text" class="form-control" name="priority">
                  <div id="priorityHelp" class="form-text">E.g 1,2,3</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container" style="margin-top: 2rem;">
  <ul id="draggablePanelList" class="list-group">
    @foreach($items as $item)
      <li class="panel panel-info list-group-item" style="width: 50%;">
          <div class="panel-heading">{{$item->name}}</div>
          <div class="panel-heading">{{$item->created_at}}</div>
          <form action="{{ route('delete', ['id' => $item->id]) }}" method="POST">
            <a class="btn btn-outline-warning" href="{{ route('edit', ['id' => $item->id]) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger" href="">Delete</button>
        </form> 
      </li>
    @endforeach
  </ul>
</div>
<style>
#draggablePanelList .panel-heading {
        cursor: move;
    }
</style>
<script>
    $(document).ready(function() {
        jQuery(function($) {
        var panelList = $('#draggablePanelList');

        panelList.sortable({
            handle: '.panel-heading', 
            update: function() {
                $('.panel', panelList).each(function(index, elem) {
                     var $listItem = $(elem),
                         newIndex = $listItem.index();
                });
            }
        });
    });
    });
</script>
@endsection