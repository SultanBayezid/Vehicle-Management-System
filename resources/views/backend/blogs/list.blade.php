@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">Blogs</h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">
            <a class="btn btn-primary btn-sm mtop" data-title="{{ ('Add Income') }}"
                href="{{ route('blogs.create') }}">
                <i class="fas fa-plus"></i> {{ _lang('Add New') }}
            </a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
        </ol>
    </nav>
    <div class="card"> <div class="card-body">
    <table id="" class="table data-table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @foreach($blogs as $blog)
                                        <tr>
                                        <td>{{ $blog->created_at->format('d/m/Y') }}</td>
                                            <td>{{$blog->title }}</td>
                                            <td>{{ Str::limit($blog->content, 50) }}</td>
                                            <td>
                                        @if ($blog->image)
                                            <img src="{{ asset('/uploads/blogs/' . $blog->image) }}" alt="Blog Image" width="100">
                                        @else
                                            No Image Available
                                        @endif
                                    </td>

                                                                            
                                                                        
                                                                                <td>
                                                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                                    </form>
                                                    </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        
                                                                
                                                                        </tbody>
                                                                    </table>
                            </div>
                        </div>
                        <div class="pagination justify-content-center mt-5">
     {{ $blogs->links('vendor.pagination.bootstrap-5') }}
</div>
                        </div>
            



@endsection
