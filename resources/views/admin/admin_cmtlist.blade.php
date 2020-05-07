@extends('admin.adminlayout')

@section('title','Admin - Comment List')


@section('content')
  <style type="text/css">
    img:hover{
      cursor: pointer;
    }
  </style>
  <div class="container-fluid" >

    <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><b>Users List</b></h1>
          </div>

  <!-- Table Start -->

       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dtHorizontalVerticalExample" width="100%" cellspacing="0"style="text-align:center;">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User ID</th>
                      <th>User Name</th>
                      <th>Blog Id</th>
                      <th>Blog Title</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>User ID</th>
                      <th>User Name</th>
                      <th>Blog Id</th>
                      <th>Blog Title</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($data as $d)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$d->uid}}</td>
                      <td>{{$d->uname}}</td>
                      <td>{{$d->bid}}</td>
                      <td>{{$d->bname}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div>

<!-- Table End -->

</div>


@endsection
      