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
          <form action="{{route('levels.store')}}" method="post">
          	@csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Rank Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Rank Number</label>
                <input type="number" class="form-control" name="rank" placeholder="Enter rank number">
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

