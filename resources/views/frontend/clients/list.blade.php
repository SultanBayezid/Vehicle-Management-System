
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
								<div class="col-12">
									<!-- cart -->
									<div class="cart">
										<div class="cart__table-wrap">
											<div class="cart__table-scroll ">
												<table class="cart__table">
													<thead>
														<tr>
															<th width="10%">Date</th>
															<th width="20%">Vehicle</th>
															<th width="20%">Pickup Location</th>
															<th width="20%">Dropoff Location</th>
															<th width="10%">Fare</th>
															<th width="10%">Status</th>
															<th width="10%">Action</th>
														</tr>
													</thead>

													<tbody>
                                                        @foreach($trips as $trip)
														<tr>
									
															<td>{{$trip->trip_date}}</td>
															<td>{{$trip->vehicle->name}}</td>
                                                            <td>{{$trip->pickup_location}}</td>
                                                            <td>{{$trip->dropoff_location}}</td>
                                                            <td>{{$trip->fare_amount}}</td>
                                                            <td>
                                                                @if($trip->status == 0)
                                                                    <span class="text-warning">Pending</span>
                                                                @elseif($trip->status == 1)
                                                                    <span class="text-success">Confirmed</span>
                                                                @elseif($trip->status == 2)
                                                                    <span class="text-danger">Cancelled</span>
                                                                @else
                                                                    <span class="text-muted">Unknown Status</span>
                                                                @endif
                                                            </td>

                                                            <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                        <form method="POST" action="" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Driver?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                            </div>
                                    
                                          </td>

													
														</tr>
                                                        @endforeach
													
												
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- end cart -->
								</div>
							</div>

						
						</div>

				


					</div>
					<!-- end content tabs -->
				</div>
			</div>
		</div>
	
@endsection

