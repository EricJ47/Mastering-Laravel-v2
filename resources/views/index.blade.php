@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                All Posts
                <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-primary float-end">Add New</a>
                <a href="" class="btn btn-sm btn-outline-secondary float-end" style="margin-right: 5px">Trash</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 10%">Image</th>
                            <th scope="col" style="width: 20%">Title</th>
                            <th scope="col" style="width: 30%">Content</th>
                            <th scope="col" style="width: 10%">Category</th>
                            <th scope="col" style="width: 10%">Publish Date</th>
                            <th scope="col" style="width: 10%">action</th>
                        </tr>
                    </thead>
                    @foreach ($posts as $index => $post) 
                    <tbody>
                        <tr>
                            
                            <th scope="row">{{$index + 1}}</th>
                            <td>
                                <img src="{{ asset('storage/' . $post->image) }}" width="80" alt="">
                            </td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->description }}</td>
                            </td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->created_at ->diffForHumans() }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-success">Show</a>
                                <a href="#" class="btn btn-sm btn-outline-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>
                            @endforeach

                        </tr>

                </table>
            </div>
        </div>
    </div>
@endSection

