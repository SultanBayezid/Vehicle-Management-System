
@extends('frontend.layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12 col-xl-10 offset-xl-1">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="/">{{ _lang('Home')}}</a></li>
						<li class="breadcrumbs__item"><a href="#">{{ _lang('Blog')}}</a></li>
						<li class="breadcrumbs__item breadcrumbs__item--active">{{$blog->title}}</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<div class="col-12 col-xl-10 offset-xl-1">
					<div class="article">
						<!-- article content -->
						<div class="article__content">
							<img src="{{ asset('/uploads/blogs/' . $blog->image) }}" alt="">

							<div class="article__meta">

								<span class="article__date"><i class="fa fa-clock fa-lg text-success"></i>&nbsp;&nbsp; {{ $blog->created_at->format('d/m/Y') }}</span>
							</div>

							<h1>{{$blog->title}}</h1>

							<p>{{$blog->content}}</p>

							
						</div>
						<!-- end article content -->

				

					</div>
				</div>
			</div>
		</div>
	
@endsection

