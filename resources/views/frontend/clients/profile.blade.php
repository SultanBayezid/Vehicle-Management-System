
@extends('frontend.layouts.app')

@section('content')


<div class="container">
			<div class="row">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumbs">
						<li class="breadcrumbs__item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumbs__item breadcrumbs__item--active">My account</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>My account</h1>
					</div>
				</div>
				<!-- end title -->
			</div>

			<div class="row">
				<div class="col-12">
					<div class="profile">
						<!-- tabs nav -->
						<ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="true">My listing</button>
							</li>

							<li class="nav-item" role="presentation">
								<button data-bs-toggle="tab" data-bs-target="#tab-2" type="button" role="tab" aria-controls="tab-2" aria-selected="false">Favorites</button>
							</li>

							<li class="nav-item" role="presentation">
								<button data-bs-toggle="tab" data-bs-target="#tab-3" type="button" role="tab" aria-controls="tab-3" aria-selected="false">Settings</button>
							</li>

							<li class="nav-item" role="presentation">
								<button data-bs-toggle="tab" data-bs-target="#tab-4" type="button" role="tab" aria-controls="tab-4" aria-selected="false">Billing</button>
							</li>
						</ul>
						<!-- end tabs nav -->
					</div>

					<!-- content tabs -->
					<div class="tab-content">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" tabindex="0">
						<div class="row">
								<!-- details form -->
								<div class="col-12 col-lg-6">
									<form action="#" class="sign__form sign__form--profile">
										<div class="row">
											<div class="col-12">
												<h4 class="sign__title">Profile details</h4>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="username">Login</label>
													<input id="username" type="text" name="username" class="sign__input" placeholder="User123">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="email1">Email</label>
													<input id="email1" type="text" name="email" class="sign__input" placeholder="email@email.com">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="firstname">First name</label>
													<input id="firstname" type="text" name="firstname" class="sign__input" placeholder="John">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="lastname">Last name</label>
													<input id="lastname" type="text" name="lastname" class="sign__input" placeholder="Doe">
												</div>
											</div>

											<div class="col-12">
												<button class="sign__btn" type="button"><span>Save</span></button>
											</div>
										</div>
									</form>
								</div>
								<!-- end details form -->

								<!-- password form -->
								<div class="col-12 col-lg-6">
									<form action="#" class="sign__form sign__form--profile">
										<div class="row">
											<div class="col-12">
												<h4 class="sign__title">Change password</h4>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="oldpass">Old password</label>
													<input id="oldpass" type="password" name="oldpass" class="sign__input">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="newpass">New password</label>
													<input id="newpass" type="password" name="newpass" class="sign__input">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="confirmpass">Confirm new password</label>
													<input id="confirmpass" type="password" name="confirmpass" class="sign__input">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="select">Select</label>
													<select name="select" id="select" class="sign__select">
														<option value="0">Option</option>
														<option value="1">Option 2</option>
														<option value="2">Option 3</option>
														<option value="3">Option 4</option>
													</select>
												</div>
											</div>

											<div class="col-12">
												<button class="sign__btn" type="button"><span>Change</span></button>
											</div>
										</div>
									</form>
								</div>
								<!-- end password form -->
							</div>

						
						</div>

				


					</div>
					<!-- end content tabs -->
				</div>
			</div>
		</div>
	
@endsection

