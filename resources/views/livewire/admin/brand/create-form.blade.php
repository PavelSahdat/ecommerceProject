@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Brands
                        <a href="" class="btn btn-primary btn-sm float-end text-white">Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">    
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">    
                            <label for="">Status</label>
                            <textarea name="status" id="" cols="30" rows="3" class="form-control"></textarea>
                            @error('status')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div><br>     

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end" class="from-control">Save</button>
                        </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</div>
@endsection
