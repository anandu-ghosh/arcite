@extends('layout.layout')
@section('title', 'Institution')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Staff</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Staff</li>
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
                <h3 class="card-title">Staff</h3>
                  
                <a class="btn btn-primary float-right" href="{{URL::to('staff/create')}}" >Add Staff</a>
              </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Staff Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Institution</th>
                    <td>Action</td>
                  </tr>
                  </thead>
                  <tbody>
                  @php($x=1)
                  @foreach($staffs as $staff)
                  <tr>
                    <td>{{$x++}}</td>
                    <td>{{$staff->name}}</td>
                    <td>{{$staff->address}}</td>
                    <td>{{$staff->email}}</td>
                    <td>{{$staff->phone}}</td>
                    <td>
                        @foreach($institutions as $institution)
                        @if($staff->institution_id == $institution->id)
                        {{$institution->name}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                    <a style="margin-right:8px;" class=" float-left btn btn-primary" href="{{route('staff.show',$staff->id)}}">
                    <i class="fas fa-eye"></i> 
                    </a>
                    <a style="margin-right:8px;" class="float-left btn btn-warning" href="{{route('staff.edit',$staff->id)}}">
                    <i class="fas fa-edit"></i> 
                    </a>
                    <form class="float-left"  action="{{route('staff.destroy',$staff->id)}}" method="post">
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
@push('scripts')
<script src="{{ asset('dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

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
@endpush    
@endsection

 