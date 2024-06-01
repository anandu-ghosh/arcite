@extends('layout.layout')
@section('title', 'Institution')
@section('content')
@include('layout.datatable.css')
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Department</h3>
                  
                <a class="btn btn-info float-right" href="{{route('department.create')}}"><i class="fas fa-plus"></i>&nbsp;Add</a>
              </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Department Name</th>
                    <th>Institution</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                
                 @foreach($departments as $department)
                 <td>{{$loop->iteration}}</td>
                 <td>{{$department->name}}</td>
                 <td>{{$department->institution->name}}</td>
                 <td>@if($department->status == 1) <button class="btn btn-success btn-xs">Active</button>
                 @else <button class="btn btn-danger btn-xs">Inactive</button> @endif </td>
                 <td>
                 <a style="margin-right:8px;" class=" float-left btn btn-primary" href="{{route('department.show',$department->id)}}">
                    <i class="fas fa-eye"></i> 
                    </a>
                    <a style="margin-right:8px;" class="float-left btn btn-warning" href="{{route('department.edit',$department->id)}}">
                    <i class="fas fa-edit"></i> 
                    </a>
                    <form action="{{route('department.destroy',$department->id)}}" class="float-left" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger" >
                        <i class="fas fa-trash"></i> 
                      </button>
                    </form>
                 </td>
                </tr>
                 @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
      
    </section>


@include('layout.datatable.js')

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["pdf", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endsection

 