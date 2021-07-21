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
          <form action="{{route('users.store')}}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="name" class="form-control" name="name" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>

              <div class="form-group">
	              <label for="exampleSelectBorderWidth2">Level Rank</label>
	              <select class="custom-select form-control-border border-width-2" name="level_id">
	              	@foreach($levels as $level)
	                <option>{{ $level->name }}</option>
	                @endforeach
	              </select>
	            </div>
	            <div class="form-group">
	              <label for="exampleSelectBorderWidth2">User Role</label>
	              <select class="custom-select form-control-border border-width-2" name="level_id">
	              	@foreach($roles as $role)
	                <option>{{ $role->name }}</option>
	                @endforeach
	              </select>
	            </div>
              <div class="form-group">
                <div class="form-check">
                  <b>Select User Permissions</b><br>
                	@foreach($permissions as $permission)
                		<input type="checkbox" name="permissions[]" class="form-check-input" value="{{$permission->id}}">
                    <label class="form-check-label">{{$permission->name}}</label>
                   @endforeach
                </div>
              </div>
            </div>
            <!-- /.card-body -->

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

