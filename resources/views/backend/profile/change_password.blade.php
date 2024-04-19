@extends('backend.layouts.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
		<h1 class="h3 mb-2 pt-3 text-gray-800">	{{ _lang('Change Password') }}</h1>

        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">{{ _lang('Profile') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Change Password') }}</li>
        </ol>
    </nav>


<div class="row">
@include('backend.profile.menu.profile_menu')

<div class="col-sm-9">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<form action="{{ url('profile/update_password') }}" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
							@csrf
							<div class="form-group">
								<label class="control-label">{{ _lang('Old Password') }}</label>
								<input type="password" class="form-control" name="oldpassword" required>
							</div>
							<div class="form-group">
								<label class="control-label">{{ _lang('New Password') }}</label>
								<input type="password" class="form-control" name="password" required>
							</div>
							<div class="form-group">
								<label class="control-label">{{ _lang('Confirm Password') }}</label>
								<input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">{{ _lang('Update Password') }}</button>
							</div>
						</form>
					</div>
                </div>				
			</div>
	</div>
</div>
</div>
@endsection

