<div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="commentTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('comments.store',$productOrder)}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <textarea type="text" name="message" class="form-control @error('message') is-invalid @enderror"
                            id="details1"></textarea>
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
    CKEDITOR.replace( 'details1' );
</script>
@endpush