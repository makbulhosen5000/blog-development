@extends('layouts.admin')
@section('content')
       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Edit Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('website')}} ">Home</a></li>
                <li class="breadcrumb-item "> <a href="{{route('category.view')}}">Category List</a></li>
                <li class="breadcrumb-item">Create Category</li>
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
                                <h3 class="card-title">Edit Category</h3>
                                <a href="{{route('category.view')}}" class="btn btn-success"> Go Back To Category List</a>
                            </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 offset-3 col-md-8 offset-md-2">
                                    <div class="card-body p-0">
                                        <!-- form start -->
                                        <form action="{{route('category.update',$EditCategory->id)}}" method="POST" role="form">
                                          @csrf
                                          @include('includes.error')
                                            <div class="card-body">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Category Name</label>
                                              <input type="name" name="name" value="{{$EditCategory->name}} " class="form-control" id="exampleInputEmail1" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Description</label>
                                              <textarea class="form-control" name="description" id="description" rows="5">{{$EditCategory->description}}</textarea>
                                            </div>
                                            </div>
                                          </div>
                                          <!-- /.card-body -->
                                          <div class="card-footer">
                                            <button type="submit" class="btn btn-success btn-lg">Update Category</button>
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
