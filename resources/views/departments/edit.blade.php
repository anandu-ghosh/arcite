@extends('layout.layout')
@section('title', 'Institution')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Department</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Department</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Department</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('department.update',$department->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Institution</label>
                    <select name="institution" class="form-control">
                      <option value="">--Select--</option>
                      @foreach ($institutions as $institution)
                        <option value="{{$institution->id}}" title="{{$institution->address}} " @if($institution->id == $department->institution_id ){{"selected"}} @endif> {{$institution->name}} </option>
                      @endforeach
                    </select>
                    @if ($errors->has('institution'))
                    <div class="error">{{ $errors->first('institution') }}</div>
                    @endif
                </div> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Department</label>
                    <input type="text" value="{{$department->name}}" name="name" class="form-control" placeholder="Department name">
                </div>                                                    
              
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

 

          </div>
          <div class="col-md-6">
        
          </div>
        </div>
    </div>  
    </section>
   
@endsection

 