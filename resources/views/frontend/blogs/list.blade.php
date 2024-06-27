
@extends('frontend.layouts.app')

@section('content')
<style>
	.mr-2{
		margin-right:15px;
	}
</style>

<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumbs__item breadcrumbs__item--active">Blog</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>Our Blog</h1>
					</div>
				</div>
				<!-- end title -->

		
			</div>

			<div class="row">
                @foreach($blogs as $blog)
				<!-- post -->
				<div class="col-12 col-md-6 col-xl-4">
					<div class="post">
						<a href="article.html" class="post__img">
                     
                             <img src="{{ asset('/uploads/blogs/' . $blog->image) }}" alt="Blog Image" >
 
						</a>

						<div class="post__content">
							
							<h3 class="post__title"><a href="{{route('blogs.show', $blog->id)}}">{{$blog->title}}</a></h3>
							<div class="post__meta">
								<span class="post__date"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z"/></svg> {{ $blog->created_at->format('d/m/Y') }}</span>
					
							</div>
						</div>
					</div>
				</div>
				<!-- end post -->
                 @endforeach
			</div>
<div class="row">
<div class="pagination justify-content-center mt-5">
     {{ $blogs->links('vendor.pagination.bootstrap-5') }}
</div>
</div>
		</div>

	
@endsection

