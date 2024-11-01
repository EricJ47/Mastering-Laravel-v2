@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                Trashed Posts
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
                                <img src="{{ asset('storage/' . $post->image) }}" width="120" alt="">
                            </td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->description }}</td>
                            </td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->created_at ->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-sm btn-outline-success">Restore</a>
                                {{-- <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-sm btn-outline-danger">Delete</a> --}}

                                <form action="{{ route('posts.kill', $post->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Kill/Delete</button>
                                </form>
                                </div>
                            </td>
                            @endforeach

                        </tr>

                </table>
            </div>
        </div>
    </div>
@endSection

