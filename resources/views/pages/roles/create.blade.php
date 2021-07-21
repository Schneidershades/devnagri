@extends('layouts.admin')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>
          </div>
          <form action="{{route('roles.store')}}" method="post">
          	@csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Role Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter role name">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <b>Select User Permissions</b><br>
                  @foreach($permissions as $permission)
                    <input type="checkbox" name="permissions[]" class="form-check-input" value="{{$permission->id}}" >
                    <label class="form-check-label">{{$permission->name}}</label>
                   @endforeach
                </div>
              </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection

