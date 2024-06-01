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
                    <th>Action</th>
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
                  <div style="display:flex">
                  
                    <div>
                    <a class="btn btn-primary mr-1" href="{{route('student.show',$student->id)}}">
                    <i class="fas fa-eye"></i> 
                    </a>
                    </div>
                  
                    <a  class="btn btn-warning mr-1" style="height:fit-content" href="{{route('student.edit',$student->id)}}">
                    <i class="fas fa-edit"></i> 
                    </a>
                                   
                    <form  action="{{route('student.destroy',$student->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-danger mr-1" >
                        <i class="fas fa-trash"></i> 
                      </button>
                    </form>
                    @if($student->status == "enquiry" )
                    <a onclick="find_batch('{{$x}}')" class=" btn btn-small btn-secondary" id="batch-{{$x}}" data-toggle="modal" data-target="#batch_add" style="display:flex">
                    <span style="font-size:12px"><i class="fas fa-plus"></i> Batch</span>
                    </a>
                    <input type="hidden" name="courseid" id="course-{{$x}}" value="{{$student->course_id}}">
                    <input type="hidden" name="studentid" id="student-{{$x}}" value="{{$student->id}}">
                    @endif

                    @if($student->batch_id)
                    <a  class=" btn btn-small btn-success" style="display:flex">
                    <span style="font-size:12px"><i class="fas fa-check"></i> Allocated</span>
                    </a>
                    @endif
                 
                  </div>
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

    <div class="modal fade" id="batch_add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Allocate Batch</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('student.batched')}}" method="POST">
              @csrf
          
            <div class="modal-body">
            <div class="form-group">
                    <label for="exampleInputPassword1">Select a batch</label>
                    <select name="batch" id="batch" class="form-control" required>
                          <option value=""> --select-- </option>                     
                    </select>
            </div>
            </div>
            <input type="hidden" name="student" id="student">
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Allocate</button>
            </div>
          </form>
          </div>
      
        </div>

      </div>


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
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>

<script>
  function find_batch(x){
    let course_id = $("#course-"+x).val();
    let student_id = $("#student-"+x).val();

    $("#batch").html('');
      $.ajax({
      type: "POST",
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
      url: "{{route('student.findBatch')}}", 
      data: {course_id:course_id},
      success:function(response){
        console.log(response);
        if($.trim(response) != ''){
          response.forEach(function (res) {
          console.log(res.name);
          $("#batch").append('<option value=' + res.id + '>' + res.name + '</option>');
          $("#student").val(student_id);
          });
        }
        else{
          $("#batch").append('<option value="">No batches found</option>');
        }

      }  
    });

  }
</script>

@endpush    
@endsection

 