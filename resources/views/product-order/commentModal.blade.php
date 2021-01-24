<div class="modal fade" id="comment" tabindex="-1" role="dialog"
aria-labelledby="commentTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Comment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('product-orders.assign',$productOrder)}}" method="post">
           @csrf
            <div class="modal-body">
                <div class="form-group">
                                <textarea type="text" name="comment"
                                    class="form-control @error('comment') is-invalid @enderror" id="details"></textarea>
                                @error('comment')
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