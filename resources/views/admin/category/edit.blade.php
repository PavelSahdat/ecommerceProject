@extends('layouts.admin')
@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category
                        <a href="{{route('admin.category')}}" class="btn btn-primary btn-sm float-end text-white">Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{url('admin/category/'.$category->id.'/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">    
                            <label for="">Slug</label>
                            <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">    
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control">{{$category->slug}}</textarea>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div><br>

                        <div class="col-md-6 mb-3">    
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{asset('/uploads/category/'.$category->image)}}" height="50px" width="40px" alt="">
                            @error('image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">    
                            <label for="">Status</label>
                            <input type="checkbox" name="status" value="1">
                        </div>
                        
                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>
                        
                        <div class="col-md-6 mb-3">    
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control">
                            @error('meta_title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        
                        <div class="col-md-12 mb-3">    
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" id="" cols="30" rows="3" class="form-control">{{$category->meta_keyword}}</textarea>
                            @error('meta_keyword')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        
                        <div class="col-md-12 mb-3">    
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" id="" cols="30" rows="3" class="form-control">{{$category->meta_description}}</textarea>
                            @error('meta_description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">    
                            <button type="submit" class="btn btn-primary float-end" class="form-control">Update</button>
                        </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
</div>

@endsection