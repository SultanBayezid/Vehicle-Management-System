<div class="modal fade" id="editModal{{$fuel->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$fuel->id}}" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$fuel->id}}">Edit issue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-4">
                <form method="POST" action="{{route('fuels.update', $fuel->id)}}"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    
                                </form>
                </div>
               
            </div>
        </div>
    </div>
</div>
