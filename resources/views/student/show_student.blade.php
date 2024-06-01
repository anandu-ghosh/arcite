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
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" value="{{$student->firstname}}" name="firstname" class="form-control" id="exampleInputEmail1" placeholder="Enter first name" >
                    @error('firstname')
                    <span style="color:red;font-weight:bold">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" value="{{$student->lastname}}" name="lastname" class="form-control" id="exampleInputEmail1" placeholder="Enter last name" >
                    @error('lastname')
                    <span style="color:red;font-weight:bold">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <textarea class="form-control" name="address" rows="3" placeholder="Enter ..." required>{{$student->address}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" value="{{$student->mobile}}" name="mobile" class="form-control" id="exampleInputEmail1" placeholder="+9112345678" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" value="{{$student->email}}" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Highest Qualification</label>
                    <select name="qualification" class="form-control" id="exampleInputEmail1" required>
                        <option value="">-- Select --</option>
                        <option value="SSLC" @if($student->qualification == "SSLC") selected @endif >SSLC</option>
                        <option value="PLUSTWO"  @if($student->qualification == "PLUSTWO") selected @endif >PLUSTWO</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Do you proceed for further enquiry?</label>
                    <select name="status"  class="form-control" id="status" required>
                        <option value="">-- Select --</option>
                        <option value=1 @if($student->status == "enquiry") selected @endif>Yes</option>
                        <option value=0 @if($student->status == "visit") selected @endif>No</option>
                    </select>   
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Aadhar number</label>
                    <input type="text" value="{{$student->aadhar_number}}" name="aadhar_number" class="form-control" id="exampleInputEmail1" >
                    </div> 

                    <div class="enquiry" id="enquiry" @if($student->status == "visit") style="display:none"; @endif>
                      <table id="example1" class="table table-bordered table-striped">
                        <tr>
                          <th>Aadhar</th>
                          <th>Photo</th>
                          <th>SSlC Certificate</th>
                          <th>Plus Two Certificate</th>
                        </tr>
                        <tr>
                          <td><img src="{{asset('uploads/images/aadhar/'.$student->aadhar_photo)}}" style="width:90px;height:85px;" alt=""></td>
                          <td><img src="{{asset('uploads/images/students/'.$student->student_photo)}}" style="width:90px;height:85px;" alt=""></td>
                          <td><img src="{{asset('uploads/images/sslc/'.$student->sslc_certificate)}}" style="width:90px;height:85px;" alt=""></td>
                          <td><img src="{{asset('uploads/images/plustwo/'.$student->plustwo_certificate)}}" style="width:90px;height:85px;" alt=""></td>
                        </tr>
                      </table>
                    </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                
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

<script>
$("#status").change(function(){
   let status = $("#status").val();
   if(status == 1){
    $("#enquiry").css("display","block");
   }
   else{
    $("#enquiry").css("display","none");
   }
  
   })
</script>

@endpush    
@endsection

 