@extends('backend.layouts.header')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">	
			<h1 class="h3 mb-2 pt-3 text-gray-800">	{{ _lang('Profile Settings') }}</h1>

        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">{{ _lang('Profile') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Profile Settings') }}</li>
        </ol>
    </nav>



<div class="row">
@include('backend.profile.menu.profile_menu')
<div class="col-sm-9">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<form action="{{ url('profile/update')}}" autocomplete="off" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post">
							@csrf
							<div class="form-group">
								<label class="control-label">{{ _lang('Name') }}</label>
								<input type="text" class="form-control" name="name" value="{{$profile->name}}" required>
							</div>
							<div class="form-group">
								<label class="control-label">{{ _lang('Email') }}</label>
								<input type="text" class="form-control" name="email" value="{{ $profile->email }}" required>
							</div>

							<div class="form-group">
								<label class="control-label">{{ _lang('Image') }} (300 X 300)</label>
								<input type="file" class="form-control dropify" data-default-file="{{ $profile->profile_picture != "" ? asset('public/uploads/profile/'.$profile->profile_picture) : '' }}" name="profile_picture" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary">{{ _lang('Update Profile') }}</button>
							</div>
						</form>
					</div>	
				</div>	
			</div>

	</div>
</div>
</div>

@endsection

