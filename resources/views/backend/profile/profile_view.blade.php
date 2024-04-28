@extends('backend.layouts.header')

@section('content')

@php $date_format = get_option('date_format','Y-m-d'); @endphp
<div class="container">
    <div class="row">
        <div class="col-md-6">
			<h1 class="h3 mb-2 pt-3 text-gray-800">	{{ _lang('My Profile') }}</h1>

        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Profile') }}</li>
        </ol>
    </nav>
<div class="row">

@include('backend.profile.menu.profile_menu')

<div class="col-sm-9">
			<div class="card-body">
				<table class="table table-bordered" width="100%">
					<tbody>
						<tr class="text-center">
							<td colspan="2"><img class="thumb-image-md" src="{{ asset('uploads/profile/' . $profile->profile_picture) }}"></td>
						</tr>
							<tr>
								<td>{{ _lang('Name') }}</td>
								<td>{{ $profile->name }}</td>
							</tr>
							<tr>
								<td>{{ _lang('Email') }}</td>
								<td>{{ $profile->email }}</td>
							</tr>
							<tr>
								<td>{{ _lang('User Type') }}</td>
								<td>{{ ucwords($profile->user_type) }}</td>
							</tr>

							@if(Auth::user()->user_type == 'user')
							<tr>
								<td>{{ _lang('Valid Until') }}</td>
								<td>{{ $profile->validUntil() }}</td>
							</tr>
							@endif
					</tbody>
				</table>
			</div>
	</div>
</div>
</div>
@endsection