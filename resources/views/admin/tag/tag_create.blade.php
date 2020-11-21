@extends('layouts.admin')
@section('content')
       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Create Tag</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('website')}} ">Home</a></li>
                <li class="breadcrumb-item "> <a href="{{route('tag.view')}}">Tag List</a></li>
                <li class="breadcrumb-item">Create Tag</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header end -->

          <!-- /.main content start -->
          <div class="content">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                              <div class="d-flex justify-content-between">
                                <h3 class="card-title">Create Tag</h3>
                                <a href="{{route('tag.view')}}" class="btn btn-success"> Go Back To Tag List</a>
                            </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 offset-3 col-md-8 offset-md-2">
                                    <div class="card-body p-0">
                                        <!-- form start -->
                                        <form action="{{route('tag.store')}}" method="POST" role="form">
                                          @csrf
                                          @include('includes.error')
                                            <div class="card-body">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Tag Name</label>
                                              <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Tag Name" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Description</label>
                                              <textarea type="text" class="form-control" name="description" id="description" rows="5" placeholder="Enter Your Description"></textarea>
                                            </div>
                                            </div>
                                          </div>
                                          <!-- /.card-body -->
                                          <div class="card-footer">
                                            <button type="submit" class="btn btn-success btn-lg">Submit</button>
                                          </div>
                                        </form>
                                      </div>

                                <!-- /.card-body -->
                              </div>
                                </div>
                            </div>

                    </div>
                    <!-- /.col-md-12 -->
                  </div>
              </div>
          </div>


@endsection
