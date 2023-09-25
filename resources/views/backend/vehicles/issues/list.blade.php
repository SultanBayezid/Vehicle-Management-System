@extends('backend.layouts.header')
@section('content') 


<div class="container">
  <h1 class="display-4">{{$vehicle->name}}</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('vehicles.index')}}">Vehicles</a>
      </li>
      <li class="breadcrumb-item " aria-current="page">{{$vehicle->name}}</li>
      <li class="breadcrumb-item active">{{ _lang('Issue') }}</li>
    </ol>
  </nav>
  <div class="card">
    <div class="card-body">
      <div class="row">
      <div class="col-md-2 col-sm-4 borderright">
   @include('backend.vehicles.menu')

      </div>
      <div class="col-md-10 col-sm-8">
      <span>
    <h1 class="display-6" style="display: inline-block;">Issues</h1>
    <button class="btn btn-primary btn-sm" style="float: right;"  data-toggle="modal" data-target="#issue"><i class="fas fa-plus"></i> Add New Issue</button>
</span>
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>Piority</th>
              <th>Driver</th>
              <th>Summary</th>
              <th>Reported Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Piority</th>
              <th>Driver</th>
              <th>Summary</th>
              <th>Reported Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody> @foreach($issues as $issue) <tr>
              <td>{{$issue->priority }}</td>
              <td>{{$issue->driver->name }}</td>
              <td>{{$issue->summary }}</td>
              <td>{{$issue->report_date }}</td>
              <td>@if ($issue->status == 1) <div class="badge badge-danger">Pending</div> @elseif ($issue->status == 2) <div class="badge badge-warning">Closed</div> @elseif ($issue->status == 3) <div class="badge badge-success">Resolved</div> @else Status: Unknown @endif </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ route('issues.show', $issue->id) }}" class="btn btn-info btn-sm">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-pen"></i>
                  </a>
                  <form method="POST" action="{{ route('issues.destroy', $issue->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vehicle?')">
                      <i class="fas fa-trash"></i>
                    </button>
                </div>
                </form>
              </td>
            </tr> @endforeach </tbody>
        </table>
      </div>
      </div>

    </div>
  </div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0">New Issue</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <form method="POST" action="{{route('issues.store')}}"  enctype="multipart/form-data">
          @csrf
          <div class="row mb-4 m-3">
                                        <div class="col-md-12">
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Vehicle <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                      <input type="text" value="{{$vehicle->name}}" class="form-control" readonly>
                                                    <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Assignee <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                    <select class="form-control " data-value="id" data-display="name" data-table="drivers" data-where="1" name="driver_id" id="driver_id" required>
                                            <option value="">{{ ('Select One') }}</option>
                                            {{ create_option("drivers", "id", "name", old('driver_id')) }}
                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Summary <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" name="summary" required="" 
                                                            placeholder="Summary" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Description</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <textarea cols="3" rows="3" name="description" 
                                                                placeholder="Description" class="form-control" value=""></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Documents</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                    <input type="file" class="form-control" name="image">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Priority <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <select class="form-control select2 select2-hidden-accessible" 
                                                                id="Priority" name="priority" required="True" style="width: 100%;" 
                                                                tabindex="-1" aria-hidden="true">
                                                            <option value="Low">Low</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Due Date</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="date" class="form-control" name="due_date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <button type="reset" class="btn btn-danger" style="margin-right: 30px; width: 100px;">
                                                    <i class="fa fa-remove"></i> Reset
                                                </button>
                                                <button type="submit" class="btn btn-primary" style="width: 100px;">
                                                    <i class="fa fa-save"></i> Save
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