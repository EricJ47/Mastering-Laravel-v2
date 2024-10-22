@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                Showing the Post
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-success float-end">Home</a>
                {{-- <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-primary float-end">Add New</a> --}}
                {{-- <a href="" class="btn btn-sm btn-outline-secondary float-end" style="margin-right: 5px">Trash</a> --}}
            </div>
            <div class="card-body">
                <table class="table table-striped">


                    <tbody>

                        {{-- <tr>
                            
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
                                <a href="#" class="btn btn-sm btn-outline-success">Show</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>

                        </tr> --}}
                        <tr>
                            <td>Id</td>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src="{{ asset('storage/' . $post->image) }}" width="320" alt=""></td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>{{ $post->name }}</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>{{ $post->description }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $post->category->name }}</td>
                        </tr>
                        <tr>
                            <td>Created At</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                @can('edit')
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="btn btn-sm btn-outline-warning float-end ">Edit</a>
                                @endcan
                                @can('delete')
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger float-end">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>

                </table>
            </div>
        </div>
    </div>
@endSection
