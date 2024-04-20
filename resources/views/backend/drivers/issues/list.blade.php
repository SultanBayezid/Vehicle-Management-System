@extends('backend.layouts.header')

@section('content')
<style>
    .car-block-two {
    position: relative;
    padding-bottom: 20px;
    border-bottom: 1px solid #f0f0f0;
    margin-bottom: 40px;
}

.car-block-two .inner-box .image-column {
    position: relative;
    margin-bottom: 20px;
}

.car-block-two .inner-box .image {
    position: relative;
    text-align: center;
    border: 1px solid #f0f0f0;
}

.car-block-two .inner-box .content-column {
    position: relative;
    margin-bottom: 10px;
}

.car-block-two .inner-box .content-column h3 {
    position: relative;
    font-size: 22px;
    font-weight: 600;
    text-transform: capitalize;
    margin-top: -5px;
}

.car-block-two .inner-box .content-column .price {
    position: relative;
    display: inline-block;
    color: #ffffff;
    font-size: 16px;
    font-weight: 600;
    padding: 3px 15px;
    line-height: 24px;
    margin-top: 12px;
    background-color: #ff5400;
    font-family: 'Montserrat', sans-serif;
    transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
}

.car-block-two .inner-box .content-column .info-box {
    position: relative;
    padding: 20px 0px;
}
.car-block-two .inner-box .content-column .lower-box {
    position: relative;
    padding-top: 3px;
}
.car-block-two .inner-box .content-column .compare-check {
    position: absolute;
    right: 15px;
    top: 0px;
    z-index: 1;
}
.car-block-two .inner-box .info-box .car-info {
    position: relative;
    font-family: 'Montserrat', sans-serif;
}
ul, li {
    list-style: none;
    padding: 0px;
    margin: 0px;
}

.car-block-two .inner-box .info-box .car-info li .info-title {
    position: relative;
    display: block;
    font-weight: 400;
    color: #848484;
}

.car-block-two .inner-box .info-box .car-info li {
    position: relative;
    color: #232527;
    font-size: 14px;
    line-height: 20px;
    min-height: 40px;
    padding-left: 24px;
    font-weight: 600;
    padding-right: 12px;
    margin-right: 10px;
    display: inline-block;
    border-right: 1px solid #eaeaea;
}
.car-block-two .inner-box .info-box .car-info li .icon {
    position: absolute;
    line-height: 24px;
    color: #848484;
    font-size: 16px;
    left: 0px;
    top: 50%;
    margin-top: -12px;
}

.btn-style-four {
    position: relative;
    padding: 8px 20px;
    line-height: 24px;
    color: #282328;
    text-align: center;
    font-size: 14px;
    font-weight: 600;
    background: #f2f2f2;
    letter-spacing: 0px;
    text-transform: uppercase;
    font-family: 'Montserrat', sans-serif;
}

.car-block-two .inner-box .content-column .lower-box .btns-box {
    position: relative;
    float: left;
}

.car-block-two .inner-box .content-column h3 {
    position: relative;
    font-size: 22px;
    font-weight: 600;
    text-transform: capitalize;
    margin-top: -5px;
}
.car-block-two .inner-box .content-column {
    position: relative;
    margin-bottom: 10px;
}

.car-block-two .inner-box .content-column {
    position: relative;
    margin-bottom: 10px;
}
</style>
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Issues') }} </h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">

            <button class="btn btn-primary btn-sm" style="float: right;"  data-toggle="modal" data-target="#issue"><i class="fas fa-plus"></i> {{ _lang('Add New Issue') }} </button>
        </div>
    </div>
    

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Issues') }}</li>
        </ol>
    </nav>


    <div class="row">
    @foreach($issues as $issue)
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$issue->vehicle->brand->name ?? '' }} {{$issue->vehicle->model->name ?? '' }} {{$issue->vehicle->myear->year ?? '' }} </h5>
        @if($issue->priority == 'Low')
    <span class="badge badge-success badge-sm">{{ $issue->priority }}</span>
@elseif($issue->priority == 'Medium')
    <span class="badge badge-warning badge-sm">{{ $issue->priority }}</span>
@elseif($issue->priority == 'High')
    <span class="badge badge-danger badge-sm">{{ $issue->priority }}</span>
@endif

        <p class="card-text h4">{{$issue->summary}}</p>
        <p class="card-text">{{$issue->description}}</p>
    <div class="btn-group">
    <button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#editModal{{$issue->id}}">  <i class="fas fa-pen"></i> {{ _lang('Edit') }} </button>
@include('backend.drivers.issues.modal.edit') 

      
        <form action="{{route('driver_issue_delete', $issue->id)}}" method="post">
                            
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm"
                                        type="submit" onclick="return confirm('Are you sure you want to delete this Issue?')"><i class="fas fa-trash"></i> {{_lang('Delete')}}</button>
                                </form>
    </div>

      </div>
    </div>
  </div>
  @endforeach

</div>



                 
 </div>


 <div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0"> {{ _lang('New Issue') }}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <form method="POST" action="{{ route('driver_issue_store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row mb-4 m-3">
        <div class="col-md-12">
            <!-- Vehicle -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Vehicle') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                    <select class="form-control" name="vehicle_id" id="driver_id" required>
                            <option value="">{{ _lang('Select One') }}</option>
                          @foreach($vehicles as $vehicle)
                          <option value="{{$vehicle->id}}">{{$vehicle->brand->name ?? ''}} {{$vehicle->model->name ?? ''}} {{$vehicle->myear->year ?? ''}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Assignee -->
 
            <input type="hidden" class="form-control" value="{{$issue->driver->id}}" name="driver_id" >

            <!-- Summary -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Summary') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" name="summary" required placeholder="{{ _lang('Summary') }}" class="form-control" value="">
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Description') }}</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <textarea cols="3" rows="3" name="description" placeholder="{{ _lang('Description') }}" class="form-control" value=""></textarea>
                    </div>
                </div>
            </div>

            <!-- Documents -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Documents') }}</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>

            <!-- Priority -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Priority') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <select class="form-control select2 select2-hidden-accessible" id="Priority" name="priority" required="True" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option value="Low">{{ _lang('Low') }}</option>
                            <option value="Medium">{{ _lang('Medium') }}</option>
                            <option value="High">{{ _lang('High') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Due Date -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Due Date') }}</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="date" class="form-control" name="due_date">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Buttons -->
    <div class="row mt-4">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9">
            <div class="input-group">
                <button type="reset" class="btn btn-danger" style="margin-right: 30px; width: 100px;">
                    <i class="fa fa-remove"></i> {{ _lang('Reset') }}
                </button>
                <button type="submit" class="btn btn-primary" >
                    <i class="fa fa-save"></i> {{ _lang('Save') }}
                </button>
            </div>
        </div>
    </div>
</form>

    </div>
  </div>
  </div>
</div>


@endsection
