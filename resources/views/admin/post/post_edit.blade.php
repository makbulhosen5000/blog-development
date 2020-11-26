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
                                <h3 class="card-title">Edit Post</h3>
                                <a href="{{route('post.view')}}" class="btn btn-success"> Go Back To Post List</a>
                            </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 offset-3 col-md-8 offset-md-2  text-center">
                                    <div class="card-body p-0">
                                        <!-- form start -->
                                        <form action="{{route('post.update',$EditPost)}}" method="POST" enctype="multipart/form-data" role="form">
                                            @csrf
                                            @include('includes.error')
                                              <div class="card-body">
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Post Title</label>
                                                <input type="name" name="title" class="form-control" value="{{$EditPost->title}} " id="title" required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Post Category</label>
                                                  <select class="form-control" name="category_id"  id="category_id" >
                                                      <option value="" style="display: none" selected>Select Category</option>
                                                      @foreach($categories as $cat)
                                                      <option @if($EditPost->category_id == $cat->id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                                      @endforeach
                                                  </select>
                                                </div>
                                              <div class="form-group">
                                                <label for="exampleInputPassword1">Image</label>
                                                <img src="{{asset('storage/post/'.$EditPost->image)}}" id="image" style="width:408px;height:238px">
                                                <input id="my-input" class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputPassword1">Description</label>
                                                  <textarea type="text" class="form-control" name="description" id="description" rows="5">{{$EditPost->description}}</textarea>
                                              </div>
                                              </div>
                                          </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-success btn-lg">Update Post</button>
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
