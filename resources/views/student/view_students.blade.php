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
            <h1 class="m-0">Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
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
                <h3 class="card-title">Student</h3>
                  
                <a class="btn btn-primary float-right" href="{{route('student.create')}}" >Add Student</a>
              </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Student Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Qualification</th>
                    <th>Photo</th>
                    <th>Course</th>
                    <td>Action</td>
                  </tr>
                  </thead>
                  <tbody>
                    @php($x=1)
                 @foreach($students as $student)
                 <td>{{$x++}}</td>
                 <td>{{$student->firstname}}&nbsp;&nbsp;{{$student->lastname}}</td>
                 <td>{{$student->address}}</td>
                 <td>{{$student->email}}</td>
                 <td>{{$student->mobile}}</td>
                 <td>{{$student->qualification}}</td>
                 <td>
                  @if($student->student_photo)
                  <img src="{{asset('uploads/images/students/'.$student->student_photo)}}" style="width:80px;height:75px" alt=""></td>
                  @endif
                 <td>@foreach($courses as $course)
                        @if($student->course_id == $course->id)
                        {{$course->name}}
                        @endif
                        @endforeach
                  </td>
                 <td>
                 <a style="margin-right:8px;" class=" float-left btn btn-primary" href="{{route('student.show',$student->id)}}">
                    <i class="fas fa-eye"></i> 
                    </a>
                    @if($student->status == "enquiry" )
                    <a style="margin-right:8px;" class="float-left btn btn-secondary" href="{{route('student.allocate',$student->id)}}">
                    Allocate Batch
                    </a>
                    @endif

                    @if($student->status == "enquiry" || $student->status == "allocated" )
                    <a style="margin-right:8px;" class="float-left btn btn-warning" href="{{route('student.edit',$student->id)}}">
                    <i class="fas fa-edit"></i> 
                    </a>
                    @endif
                    
                    <form class="float-left"  action="" method="post">
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

 