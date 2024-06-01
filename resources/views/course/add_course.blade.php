@extends('layout.layout')
@section('title', 'Institution')
@section('content')
@include('layout.datatable.css')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Course</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Course</li>
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
                <h3 class="card-title">Add Course</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('course.store')}}" method="POST">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Select Institution</label>
                    <select name="institution" id="institution" class="form-control" required>
                          <option value=""> --select--
                          @foreach($institutions as $institution)
                          <option value="{{$institution->id}}">{{$institution->name}}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Department</label>
                    <select name="department" id="department" class="form-control" required>
                          <option value=""> --select--</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required>
                    @if ($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                    @endif
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
    <script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
  <script>
  $(document).ready(function(){
  $('#institution').change(function(){
      var institutionId = $(this).val();
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
          type: 'POST',
          url: '/departments',
          data: {
                institution_id: institutionId
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
            },  
          success: function(response){
          $('#department').empty();
          $.each(response, function(index, department){
          $('#department').append('<option value="' + department.id + '">' + department.name + '</option>');
          });
          }
      });
  });
  });
  </script>

@include('layout.datatable.js')  
@endsection

 