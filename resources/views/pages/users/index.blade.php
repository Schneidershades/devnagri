@extends('layouts.admin')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{route('users.create')}}" class="btn-lg btn-success">Create @yield('title')</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->identifier}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->roles->first() ? $user->roles->first()  : 'N/A' }}</td>
                  <td>Level</td>
                  <td>
                    <a class="btn-xs btn-primary">Edit</a>
                    <a class="btn-xs btn-warning">View</a>
                    <a class="btn-xs btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')
<script src="{{URL::to('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{URL::to('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{URL::to('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
	<script type="text/javascript">
   $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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

@section('styles')
   <link rel="stylesheet" href="{{URL::to('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection


