@extends('layouts.admin')
@section('content')
       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Show Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('website')}} ">Home</a></li>
                <li class="breadcrumb-item "> <a href="{{route('post.view')}}">Post List</a></li>
                <li class="breadcrumb-item">Show Post</li>
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
                                <h3 class="card-title">Show Post</h3>
                                <a href="{{route('post.view')}}" class="btn btn-success"> Go Back To Post List</a>
                            </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col md-12">
                                    <div class="card-body">
                                      <!-- /.card-body -->
                                      <table class="table table-bordered table-primary">
                                        <tbody>
                                            @foreach ($showPosts as $showPost)
                                            <tr>
                                                <th style="width: 200px">Image</th >
                                                <td><img src="{{asset('storage/post/'.$showPost->image)}}" width="300px";height=300px' alt=""></td>
                                            </tr>
                                            <tr>
                                                <th style="width: 200px">Title</th >
                                                <td>{{$showPost->title}}</td>
                                            </tr>

                                            <tr>
                                                <th style="width: 200px">Category Name</th>
                                                <td>{{$showPost->category->name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 200px">Post Tag</th>
                                                <td>
                                                    @foreach ($showTags as $showTag)
                                                    <span class="badge badge-primary">{{$showTag->name}}</span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 200px">Author Name</th>
                                                <td>{{$showPost->user->name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 200px">Description</th>
                                                <td>{{!!$showPost->description!!}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

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
