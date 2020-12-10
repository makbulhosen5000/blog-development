@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tag List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Website Home</a></li>
            <li class="breadcrumb-item active">Tag List</li>
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
                      <h3 class="card-title">Tag List</h3>
                      <a href="{{route('tag.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i>Create Tag</a>
                  </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Post Count</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if($tags->count())
                          @foreach ($tags as $key=> $tag)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->slug}}</td>
                            <td>{{$tag->id}}</td>
                            <td class="d-flex">
                                <a href="{{route('tag.edit',$tag->id)}} " class="btn btn-primary mr-1" title="Edit"><i class="fa fa-user-edit"></i></a>
                                <a href="{{route('tag.delete',$tag->id)}} " id="delete" class="btn btn-danger mr-1" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          @endforeach
                          @else
                          <td colspan="5">
                              <h5 class="text-center">No Tag Found</h5>
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
