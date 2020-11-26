@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Post List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item active">Post List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Post List</h3>
                      <a href="{{route('post.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i>Create Post</a>
                  </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Category</th>
                          <th>Authtor</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if($posts->count())
                          @foreach ($posts as $key=> $post)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$post->title}}</td>
                            <td><img src="{{asset('storage/post/'.$post->image)}}" width="60px";height='60px' alt=""></td>
                            <td>{{$post->category->name}} </td>
                            <td>{{$post->user->name}} </td>
                            <td class="d-flex">
                                <a href="{{route('post.edit',$post->id)}} " class="btn btn-primary mr-1" title="Edit"><i class="fa fa-user-edit"></i></a>
                                <a href="{{route('post.delete',$post->id)}} " id="delete" class="btn btn-danger mr-1" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          @endforeach
                          @else
                          <td colspan="6">
                              <h5 class="text-center">No Post Found</h5>
                          </td>
                          @endif
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
          </div>
          <!-- /.col-md-12 -->
        </div>
    </div>
</div>
  <!-- /.content -->

  @endsection
