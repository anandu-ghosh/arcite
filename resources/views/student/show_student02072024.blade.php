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
        <div class="col-md-12">
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
                 <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" name="firstname" value="{{$student->firstname}}" class="form-control" id="exampleInputEmail1" placeholder="Enter first name" >
                      @error('firstname')
                      <span style="color:red;font-weight:bold">{{$message}}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Middle Name</label>
                      <input type="text" name="middlename" value="{{$student->middlename}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Middle name" >
                      @error('middlename')
                      <span style="color:red;font-weight:bold">{{$message}}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" name="lastname" value="{{$student->lastname}}" class="form-control" id="exampleInputEmail1" placeholder="Enter last name" >
                    @error('lastname')
                    <span style="color:red;font-weight:bold">{{$message}}</span>
                    @enderror
                  </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date Of Bitrh</label>
                      <input type="date" name="birthdate" value="{{$student->birthdate}}" class="form-control" id="exampleInputEmail1"  required>
                      @error('birthdate')
                    <span style="color:red;font-weight:bold">{{$message}}</span>
                    @enderror
                    </div>
                  </div>

                </div>

                <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <select name="gender" class="form-control" id="exampleInputEmail1" required>
                      <option value="">--Select--</option>
                      <option value="1" @if($student->gender == "1" ) selected @endif > Male </option>
                      <option value="2" @if($student->gender == "2" ) selected @endif > Female </option>
                      <option value="3" @if($student->gender == "3" ) selected @endif > Transgender </option>
                      <option value="4" @if($student->gender == "4" ) selected @endif> Do Not Want to reveal </option>
                    </select>
                    @error('gender')
                    <span style="color:red;font-weight:bold">{{$message}}</span>
                    @enderror
                  </div>
                </div> 

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="tel" name="mobile" value="{{$student->mobile}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile Number" required>
                    @error('mobile')
                    <span style="color:red;font-weight:bold">{{$message}}</span>
                    @enderror
                  </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telephone</label>
                    <input type="tel" name="telephone" value="{{$student->telephone}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Telephone" required>
                  </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="{{$student->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                  </div>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Highest Qualification</label>
                    <select name="qualification" class="form-control" id="exampleInputEmail1" required>
                        <option value="">-- Select --</option>
                        <option value="SSLC" @if($student->qualification == "SSLC" ) selected @endif >SSLC</option>
                        <option value="PLUSTWO"  @if($student->qualification == "PLUSTWO" ) selected @endif >PLUSTWO</option>
                    </select>
                  </div>
                    </div>

                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Guardian Name</label>
                    <input type="text" value="{{$student->guardianname}}" name="guardianname" class="form-control" id="exampleInputEmail1" placeholder="Enter Guardian Name" required>
                  </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Relationship to Guardian</label>
                    <input type="text" value="{{$student->relationshiptoguardian}}" name="relationshiptoguardian" class="form-control" id="exampleInputEmail1" placeholder="Enter Relationship" required>
                  </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Guardian Telephone</label>
                    <input type="tel" value="{{$student->guardiantelephone}}" name="guardiantelephone" class="form-control" id="exampleInputEmail1" placeholder="Enter Guardian Telephone" required>
                  </div>
                  </div>

                  </div>

                  <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <textarea class="form-control" name="address" rows="3" placeholder="Enter address" required>{{$student->address}}</textarea>
                  </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">State <span style="color:red">*</span></label>
                    <input type="text" value="{{$student->state}}" name="state" class="form-control" id="exampleInputEmail1" placeholder="Enter State" required>
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">City <span style="color:red">*</span></label>
                    <input type="text" value="{{$student->city}}" name="city" class="form-control" id="exampleInputEmail1" placeholder="Enter City" required>
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                  <label> Zipcode <span style="color:red">*</span></label>
                    <input type="text" value="{{$student->zipcode}}" name="zipcode" class="form-control" id="exampleInputEmail1" placeholder="Enter zipcode" required>
                  </div>
                  </div>

                  </div>
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Aadhar Number</label>
                      <input type="text" value="{{$student->aadhar_number}}" name="aadhar_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Adhar Number" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Upload Aadhar</label>
                      <input type="file" name="aadhar_photo" class="form-control" id="exampleInputEmail1" >
                      <img id="adr"  src="{{asset('uploads/images/aadhar/'.$student->aadhar_photo)}}" style="width:85px;height:85px;padding:5px" alt="Adhar">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Upload Photo</label>
                      <input type="file" name="student_photo" class="form-control" id="exampleInputEmail1" >
                      <img id="pic" src="{{asset('uploads/images/students/'.$student->student_photo)}}" style="width:85px;height:85px;padding:5px" alt="Photo">
                      </div>
                    </div>   
                
                  </div>

                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Upload SSLC Certtificate</label>
                      <input type="file" name="sslc_photo" class="form-control" id="exampleInputEmail1" >
                      <img id="tenth" src="{{asset('uploads/images/sslc/'.$student->sslc_certificate)}}" style="width:85px;height:85px;padding:5px" alt="SSLC">
                      </div> 
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Upload PLUSTWO Certtificate</label>
                      <input type="file" name="plustwo_photo" class="form-control" id="exampleInputEmail1" >
                      <img id="twelth" src="{{asset('uploads/images/plustwo/'.$student->plustwo_certificate)}}" style="width:85px;height:85px;padding:5px" alt="Plusteo">
                      </div>
                    </div>

                  </div>

                  <div class="row" style="margin:15px 0 0 0">
                    <div class="col-md-12">
                    <label for="exampleInputEmail1">Courses Opted <span style="color:red">*</span></label>
                    </div>
                    <div class="col-md-4 mb-4">
                      <label for="institution">Select Institution</label>
                      <select name="institution" id="institution" class="form-control">
                      <option value="">--Select--</option>
                        @foreach ($institutions as $institution)
                          <option value="{{$institution->id}}" {{ $student->institution_id == $institution->id ? 'selected' : '' }} > {{ $institution->name }} </option>                          
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-10">
                        <table id="coursesOpted" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                              <th>Department</th>
                              <th>Course</th>
                              <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>

                                  @php
                                  $selectedCourses = unserialize($student->courses);
                                  $i=0;
                                  @endphp

                              @foreach(unserialize($student->departments) as $index => $dpt)
                             
                              <tr>
                                <td>
                                  <select class="form-control department" name="departments[]" >
                                    <option value="">--Select--</option>
                                    @foreach ($uniqueDepartments as $department)
                                      <option value="{{$department->id}}" @if($department->id == $dpt) selected @endif > {{$department->name}} </option>
                                    @endforeach
                                  </select>
                                </td>
                                <td>
                                  <select class="form-control course" name="courses[]">
                                   @foreach($courses as $course)
                                    <option value="{{$course->id}}" @if($course->id == $selectedCourses[$i]) selected @endif > 
                                      {{ $course->name }} </option>
                                  @endforeach
                                  </select>
                                </td>
                                <td>
                                  @if($loop->iteration != 1)
                                  <button type="button"  class="btn btn-danger removeRowBtn">
                                  <i class="fas fa-trash"></i> 
                                  </button>
                                  @endif
                                </td>
                              </tr>
                              @php
                              $i++;
                              @endphp
                              @endforeach  
                              
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-2">
                    <button id="addRowBtn" type="button" class="btn btn-info"><i class="fas fa-plus"></i> </button>
                    </div>
                  </div>

                  <div class="row" style="margin:15px 0 0 0">
                    <div class="col-md-12">
                    <label for="exampleInputEmail1">References (if Any) </label>
                    </div>
                    <div class="col-md-10">
                        <table id="references" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                              <th>Referenced Person</th>
                              <th>Relationship to the reference</th>
                              <th>Reference Contact Number	</th>
                              <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @php
                                $relationship = unserialize($student->relationship);
                                $referencecontact = unserialize($student->referencecontact);
                                $i=0;
                              @endphp
                              @foreach(unserialize($student->referenced_person) as $rfc)  
                              <tr>
                                <td>
                                  <input type="text" value="{{ $rfc }}" class="form-control" name="referenced_person[]" id="">
                                </td>
                                <td>
                                <input type="text" value="{{ $relationship[$i] }}" class="form-control" name="relationship[]" id="">
                                </td>
                                <td>
                                <input type="text" value="{{ $referencecontact[$i] }}" class="form-control" name="referencecontact[]" id="">
                               </td>
                               <td>
                                  @if($loop->iteration != 1)
                                  <button type="button" id="removeRowBtn2" class="btn btn-danger">
                                  <i class="fas fa-trash"></i> 
                                  </button>
                                  @endif
                                </td>
                              </tr>
                              @php
                              $i++;
                              @endphp
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-2">
                    <button id="addRowBtn2" type="button" class="btn btn-info"><i class="fas fa-plus"></i> </button>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                    <label for="exampleInputEmail1">Comments </label>
                      <textarea class="form-control" name="comments" id="">{{ $student->comments }}</textarea>
                    </div>
                  </div>
  
                </div>

                <!-- /.card-body -->

              <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
                
              </form>
            </div>
            <!-- /.card -->

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

<script>
  $('#status').on('change', function() {
    var status = $('#status').val();
    if(status){
      if(status == 1){
        $('#enquiry_modal').modal('show');
      }
     
    }
});

$("#close").click(function(){
  $('#enquiry_modal').modal('hide');
})

$("#continue").click(function(){
  $('#enquiry_modal').modal('hide');
})


$(document).ready(function() {
    $('#addRowBtn').click(function() {
      $('input[required], select[required]').prop('disabled', true);
      var newRow = '<tr>' +
                        '<td>' +
                            '<select class="form-control department" name="departments[]" id="">' +
                                '<option value="">--Select--</option>' +
                                '@foreach ($uniqueDepartments as $department)' +
                                    '<option value="{{$department->id}}"> {{$department->name}} </option>' +
                                '@endforeach' +
                            '</select>' +
                        '</td>' +
                        '<td>' +
                            '<select class="form-control course" name="courses[]" id="">' +
                                '<option value="">--Select--</option>' +
                            '</select>' +
                        '</td>' +
                        '<td>' +
                            '<button class="btn btn-danger removeRowBtn"><i class="fas fa-trash"></i></button>' +
                        '</td>' +
                    '</tr>';
    $('#coursesOpted tbody').append(newRow);

    setTimeout(function(){
            $('input[required], select[required]').prop('disabled', false);
        }, 100);

        setTimeout(function() {
            $('#addRowBtn').focus();
        }, 200);  

    })

    $('#coursesOpted').on('click', '.removeRowBtn', function() {
        $(this).closest('tr').remove();
    });


    $('#coursesOpted').on('change', '.department', function() {
      var departmentId = $(this).val();
      var courseId = $(this).closest('tr').find('.course');
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        type:'POST',
        url:'/courses',
        data: {
          department_id:departmentId,
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success:function(response){
          
          courseId.empty();
         $.each(response, function(index, course) {
          courseId.append('<option value="' + course.id + '">' + course.name + '</option>');
        });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
    });



    $('#addRowBtn2').click(function() {
      $('input[required], select[required]').prop('disabled', true);
      var newRow = '<tr>' +
                        '<td>' +
                            '<input type="text" class="form-control" name="referenced_person[]" id="">' +
                        '</td>' +
                        '<td>' +
                            '<input type="text" class="form-control" name="relationship[]" id="">' +
                        '</td>' +
                        '<td>' +
                            '<input type="text" class="form-control" name="referencecontact[]" id="">' +
                        '</td>' +
                        '<td>' +
                            '<button class="btn btn-danger removeRowBtn2"><i class="fas fa-trash"></i></button>' +
                        '</td>' +

                    '</tr>';
    $('#references tbody').append(newRow);

    setTimeout(function(){
            $('input[required], select[required]').prop('disabled', false);
        }, 100);

        setTimeout(function(){
            $('#addRowBtn2').focus();
        }, 200); 
    
    })
    $('#references').on('click', '.removeRowBtn2', function() {
        $(this).closest('tr').remove();
    });


  })

</script>

@endpush    
@endsection

 