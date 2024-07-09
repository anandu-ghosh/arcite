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
            <h1 class="m-0">Fees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Fees</li>
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
                <h3 class="card-title">Student List</h3>
              
              </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Courses</th>
                    <th>Total Fees</th>
                    <th>Paid Fees</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($student_fees as $student_fee)
                               
                 <tr>
                 <td>{{ $loop->iteration }}</td>
                 <td>{{$student_fee->firstname}}&nbsp;&nbsp;{{$student_fee->middlename}}&nbsp;&nbsp;{{$student_fee->lastname}}</td>
                 <td>{{$student_fee->email}}</td>
                 <td>{{$student_fee->mobile}}</td>
                 <td>
                  @foreach ($student_fee->courseNames() as $courseName )
                  {{ $courseName }} <br>
                  @endforeach
                  </td>
                  <td> @php
                          $fees = unserialize($student_fee->fees);
                          $sum = array_sum($fees);
                          $balance = $sum - $student_fee->total_fees_paid;
                          $balance_double = (double)$balance;
                          echo $sum;
                       @endphp</td>
                  <td>{{ $student_fee->total_fees_paid }}</td>
                  <td>
                  @if($balance>0)
                    <button class="btn btn-small btn-success pay-button" type="button" data-balance="{{ $balance_double }}" data-student="{{ $student_fee->id }}" data-toggle="modal" data-target="#paymentModal"><i class="fas fa-wallet"></i> Pay</button>
                  
                  @else
                    <button class="btn btn-small btn-warning" disabled ><i class="fas fa-check"></i> Paid</button>
                  @endif
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

    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="paymentModalLabel">Balance amount to pay -  <span style="color:red" id="balanceDisplay"></span> </h6>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('fees.store')}}" method="POST">
              @csrf
                <div class="modal-body">
                    <div class="form-group">
                      <label for="">Enter the amount to pay</label>
                      <input type="text" name="amount" class="form-control" placeholder="amount">
                      <input type="hidden" name="student_id" id="student_id"> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-wallet"></i> Pay</button>
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
      "buttons": []
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
    $(document).ready(function() {
        $('.pay-button').click(function() {
            // Retrieve balance from data attribute
            var balance = $(this).data('balance');
            var student_id = $(this).data('student');
            
            // Display balance in modal body
            $('#balanceDisplay').text(balance+' rupees');
            $('#student_id').val(student_id);
            // Show the modal
            $('#paymentModal').modal('show');
        });
    });
</script>

<!-- <script>
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
</script> -->

@endpush    
@endsection

 