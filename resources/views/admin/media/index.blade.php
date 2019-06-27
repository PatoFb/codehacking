@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    @if(Session::has('deleted_photo'))

      <p class="bg-danger">{{session('deleted_photo')}}</p>

    @endif

    @if(Session::has('added_photo'))

      <p class="bg-success">{{session('added_photo')}}</p>

    @endif

@if($photos)

    <form action="delete/media" method="post" class="form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="delete_all" class="btn-primary">
        </div>

    <div class="container">
      <table class="table table-striped">
        <thead>
          <tr>
              <th><input type="checkbox" id="options"></th>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>

          </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
          <tr>
              <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
            <td>{{$photo->id}}</td>
            <td><img height="50" src="{{$photo->file}}" alt=""></td>
            @if ($photo->created_at == null)
              <td>{{$photo->created_at}}</td>
            @else
              <td>{{$photo->created_at->diffForHumans()}}</td>
              @endif
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>

    </form>

    @endif

    <div class="row">
        <div class="form-group col-sm-offset-5">
            {{$photos->render()}}
        </div>
    </div>

    @stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#options').click(function(){
                if(this.checked){
                    $('.checkBoxes').each(function () {
                        this.checked = true;
                    });
                } else {
                    $('.checkBoxes').each(function () {
                        this.checked = false;
                    });
                }
            });
        });
    </script>
    @endsection