@extends('layouts.admin')
@section('content')
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
                                <div class="col-12 col-lg-8 offset-lg-2 offset-3 col-md-8 offset-md-2">
                                    <div class="card-body p-0">
                                        <!-- form start -->
                                        <form action="{{route('post.update',$EditPost->id)}}" method="POST" enctype="multipart/form-data" role="form">
                                            @csrf
                                            @include('includes.error')
                                              <div class="card-body">
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Post Title</label>
                                                <input type="text" name="title" class="form-control" value="{{$EditPost->title}} " id="title" required>
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

                                                 <div class="form-group d-flex flex-wrap" style="margin-right:20px">
                                                    <label>Chose Post Tag</label>
                                                    <div class=" d-flex flex-wrap">
                                                    @foreach ($tags as $tag)
                                                   <div class="custom-control custom-checkbox">
                                                     <input class="custom-control-input" type="checkbox" name="tags[]" id="tag{{$tag->id}}" value="{{$tag->id}}"
                                                     @foreach($EditPost->tags as $p)
                                                     @if($tag->id == $p->id) checked @endif
                                                    @endforeach
                                                    >
                                                    <label for="tag{{$tag->id}}" class="custom-control-label">{{$tag->name}}</label>
                                                   </div>
                                                   @endforeach
                                                   </div>
                                                 </div>

                                              <div class="form-group">
                                                <label for="exampleInputPassword1">Image</label>
                                                <img src="{{asset('storage/post/'.$EditPost->image)}}" id="image" style="width:565px;height:238px">
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
                                        {{-- form end --}}

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

{{-- for summernote text editor --}}
@section('style')
    <link rel="stylesheet" href="{{asset('/')}}/public/assets/admin/dist/css/summernote-bs4.min.css">
@endsection

@section('script')
    <script src="{{asset('/')}}/public/assets/admin/dist/js/summernote-bs4.min.js"></script>
    <script>
        $('#description').summernote({
            placeholder: 'Write your massage',
            tabsize: 2,
            height: 300
        });
    </script>
@endsection
