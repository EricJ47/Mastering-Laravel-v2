@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                All Trashed Posts
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-primary float-end">Back</a>
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
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <img src="https://picsum.photos/200" width="80" alt="">
                            </td>
                            <td>ahahahahah aja</td>
                            <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus ipsam fugit, porro, sit
                                 </td>
                            <td>Electronic</td>
                            <td>2-2-2022</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-success">Show</a>
                                <a href="{{ route('posts.update') }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>

                        </tr>

                </table>
            </div>
        </div>
    </div>
@endSection
