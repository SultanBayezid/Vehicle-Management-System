<div class="modal fade" id="showModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{$service->id}}" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{$service->id}}">Service Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-bordered">
                    <tr>
                        <td>{{ _lang('Vehicle') }}</td>
                        <td>{{$service->vehicle->name}}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Completion Date') }}</td>
                        <td>{{$service->completed_date}}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Odometer') }}</td>
                    
                        <td>{{$service->odometer}}</td>
                    </tr>

                    <tr>
                        <td>{{ _lang('Documents') }}</td>
                        <td>
                            @if($service->document != "")
                            <a href="{{ asset('uploads/service/'.$service->document) }}"
                                target="_blank" class="btn btn-primary">{{ _lang('View Attachment') }}</a>
                            @else
                            <label class="label label-warning">
                                <strong>{{ _lang('No Atachment Available !') }}</strong>
                            </label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Description') }}</td>
                        <td>{{$service->description}}</td>
                    </tr>
                    <tr>
                        <td>
                            Issues
                        </td>
                        <td>
                        @foreach($service->issues as $issue)
                                <li>{{ $issue->summary }} 
                                     @if ($issue->status == 1)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($issue->status == 2)
                                        <span class="badge badge-info">Closed</span>
                                    @elseif ($issue->status == 3)
                                        <span class="badge badge-success">Resolved</span>
                                    @endif </li>
                            @endforeach</td>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>