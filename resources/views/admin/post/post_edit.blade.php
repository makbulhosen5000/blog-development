@extends('layouts.admin')
@section('content')
       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Edit Tag</h1>
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
                                <h3 class="card-title">Edit Tag</h3>
                                <a href="{{route('tag.view')}}" class="btn btn-success"> Go Back To Tag List</a>
                            </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 offset-3 col-md-8 offset-md-2">
                                    <div class="card-body p-0">
                                        <!-- form start -->
                                        <form action="{{route('tag.update',$EditTag->id)}}" method="POST" role="form">
                                          @csrf
                                          @include('includes.error')
                                            <div class="card-body">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Category Name</label>
                                              <input type="name" name="name" value="{{$EditTag->name}} " class="form-control" id="exampleInputEmail1" required>
                                            </div>
                                             <div class="form-group">
                                              <label for="exampleInputPassword1">Description</label>
                                              <textarea class="form-control" name="description" rows="5">{{$EditTag->description}}</textarea>
                                            </div>
                                            </div>
                                          </div>
                                          <!-- /.card-body -->
                                          <div class="card-footer">
                                            <button type="submit" class="btn btn-success btn-lg">Update Tag</button>
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
