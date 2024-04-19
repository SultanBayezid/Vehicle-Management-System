@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">Blog Create</h1>
        </div>

    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
        
            <li class="breadcrumb-item"><a href="{{route('blogs.index')}}">Blogs</a></li>

            <li class="breadcrumb-item active" aria-current="page">Blog Create</li>
        </ol>
    </nav>
            
                            <div class="card-body">
                            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-12">
            <!-- Row 1 -->
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="title" id="name" class="form-control" required>
            </div>
 
        </div>
        
        <!-- Column 2 -->
        <div class="col-md-12">
            <!-- Row 2 -->
            <div class="form-group">
                <label for="postal_code">Content</label>
                <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            
 
        </div>
        
        <!-- Column 3 -->
        <div class="col-md-12">
            <!-- Row 3 -->

            
            <!-- Photo Upload -->
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="image" id="photo" class="form-control-file">
            </div>
        </div>
    </div>
</div>

            <button type="submit" class="btn btn-primary">Create Blog</button>
        </form>
                            </div>
                        </div>
                    </div>
                    </div>



@endsection
