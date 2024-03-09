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
            <h1 class="m-0">Batch</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Batch</li>
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
                <h3 class="card-title">Allocate Batch</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('student.batched',$student->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Select a batch</label>
                    <select name="batch" class="form-control" required>
                          <option value=""> --select--
                          @foreach($batch as $batch)
                          @if($student->course_id == $batch->course_id)
                          <option value="{{$batch->id}}">{{$batch->name}}</option>
                          @endif
                          @endforeach
                    </select>
                  </div>
               
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Allocate</button>
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

 