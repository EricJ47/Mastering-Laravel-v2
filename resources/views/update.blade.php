@extends('layouts.master')

@section('content')
    <div class="main-content">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Edit Post</h4>
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-success float-end">Back</a>
                {{-- <a href="" class="btn btn-sm btn-outline-secondary float-end" style="margin-right: 5px">Trash</a> --}}
            </div>
            <div class="card-body">
                <form action=" {{ route('posts.update', $post->id) }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        
                    <div class="form-group">
                        <img src="{{ asset('storage/' . $post->image) }}" alt=""  class="img-fluid img-thumbnail" style="margin-bottom: 6px ; width: 160px "> <br>
                        <label for="title">Image</label>
                        <input type="file" name="image" id="title" class="form-control" >
                    </div>
                    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $post->name }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Category</label>
                        <select name="category_id" id="" class="form-control" >
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Content</label>
                        <textarea name="description" id="content" cols="30" rows="10" class="form-control" >{{ $post->description }}</textarea>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endSection
