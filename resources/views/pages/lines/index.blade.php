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
                @if ($edit)
                    <form method="POST" action="{{ route('line.update', $res->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $res->id }}">
                        @include('pages.lines.partials.form', ['edit' => $edit])
                    </form>
                @else
                    <form method="POST" action="{{ route('line.save') }}">
                        @csrf
                        @include('pages.lines.partials.form', ['edit' => $edit])
                    </form>
                @endif
            </div>

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
