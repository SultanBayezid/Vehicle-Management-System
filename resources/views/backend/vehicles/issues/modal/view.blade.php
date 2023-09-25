<div class="modal fade" id="showModal{{$issue->id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{$issue->id}}" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{$issue->id}}">Issue Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-bordered">
                    <tr>
                        <td>{{ _lang('Vehicle') }}</td>
                        <td>{{$issue->vehicle->name}}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Assignee') }}</td>
                        <td>{{$issue->driver->name}}</td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Summary') }}</td>
                    
                        <td>{{$issue->summary}}</td>
                    </tr>

                    <tr>
                        <td>{{ _lang('Priority') }}</td>
                        <td>{{$issue->priority}}</td>

                      
                    </tr>
                    <tr>
                        <td>{{ _lang('Due Dat') }}</td>
                        <td>{{$issue->due_date}}</td>

                       
                    </tr>
                    <tr>
                        <td>{{ _lang('Reported Date') }}</td>
                        <td>{{$issue->report_date}}</td>

                       
                    </tr>
                    <tr>
                        <td>{{ _lang('Documents') }}</td>
                        <td>
                            @if($issue->image != "")
                            <a href="{{ asset('uploads/issue/'.$issue->image) }}"
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
                        <td>{{$issue->description}}</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>