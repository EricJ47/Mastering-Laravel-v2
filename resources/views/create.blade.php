@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                <h4>New Post</h4>
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-success float-end">Back</a>
                {{-- <a href="" class="btn btn-sm btn-outline-secondary float-end" style="margin-right: 5px">Trash</a> --}}
            </div>
            <div class="card-body">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="title">Image</label>
                        <input type="file" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Category</label>
                        <select name="category" id="" class="form-control">
                            <option value="">Select Category</option>
                            <option value="">Tes 1</option>
                            <option value="">Tes 2</option>
                            <option value="">Tes 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Content</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endSection
