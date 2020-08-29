@extends('layouts.master')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create New Production Line</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">New Line</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                @php
                    if ($edit) {
                        $name = $res->name;
                        $des = $res->description;
                        $route = 'line.update';
                        $method = 'PUT';
                    }else{
                        $name = '';
                        $des = '';
                        $route = 'line.save';
                        $method = 'POST';
                    }
                @endphp
              <form method="{{ $method }}" action="{{ route($route) }}">
                @csrf
                @if ($edit)
                <input type="hidden" value="{{ $res->id }}">
                @endif

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>

                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" id="description" name="description" id="description" rows="10">{{ $des }}</textarea>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    @if ($edit)
                        <button type="submit" class="btn btn-primary">Update</button>
                    @else
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @endif

                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Striped Full Width Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href="{{ url('production/line/edit/').'/'.$item->id }}"><button type="button"
                                    class="btn btn-primary btn-rounded btn-sm my-0">Edit</button></a>
                                <a href="{{ url('production/line/delete/').'/'.$item->id }}"><button type="button"
                                    class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></a>


                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
      </div>
    </div>
  </div>


@endsection
