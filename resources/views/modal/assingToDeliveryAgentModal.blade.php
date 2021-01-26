<div class="modal fade" id="assingToDeliveryAgent" tabindex="-1" role="dialog"
    aria-labelledby="assingToDeliveryAgentTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Assing to Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('product-orders.assign',$productOrder)}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Delivery Agent Select</label>
                        <select class="selectpicker form-control " name="user_id" data-live-search="true"
                            data-size="5">
                            <option value="" selected>Select User</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}" data-subtext="{{$user->branch->name}}"> {{$user->name}}
                            </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="">Comments</label>
                        <textarea type="text" name="message" class="form-control @error('message') is-invalid @enderror"
                            id="details"></textarea>
                        @error('message')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')   
<script>
     CKEDITOR.replace('details', {
      height: 120
    });
</script>
@endpush