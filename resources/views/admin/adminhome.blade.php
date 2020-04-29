@extends('admin.adminlayout')

@section('title','Admin - Create Blog')


@section('content')

<!-- Begin Page Content -->
        <div class="container-fluid">

	      <!-- Page Heading -->
	      <div class="d-sm-flex align-items-center justify-content-between mb-4">
	        <h1 class="h3 mb-0 text-gray-800" style="font-size: 45px;"><b>Create Blog</b></h1>
	      </div>
	      <br>
      	<form method="post" action="{{ url('crtblog') }}">
      	@csrf
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="btitle" placeholder="Enter Blog Title" id="btitle" value="{{ old('btitle') }}" required="">
                  </div>
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="bsummary" placeholder="Enter Blog Summary" id="bsummary" value="{{ old('bsummary') }}" required="">
                  </div>
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <button class="btn btn-primary btn-user btn-block" id="add">
                      Add
                    </button>
                  </div>
                </div>
          </div>
        </div><br>
	      <textarea id="posttext" name="posttext" style="height: 300px;">Enter Blog Post Text Here.</textarea>
	    </form>
          <br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Blog List Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dtHorizontalVerticalExample" width="100%" cellspacing="0"style="text-align:center;">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Post Title</th>
                      <th>Author</th>
                      <th>Created Date Time</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Post Title</th>
                      <th>Author</th>
                      <th>Created Date Time</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($data as $d)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$d->ptitle}}</td>
                      <td>{{$d->author}}</td>
                      <td>{{$d->createdate}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>


      <!-- End of Main Content -->

@endsection
      