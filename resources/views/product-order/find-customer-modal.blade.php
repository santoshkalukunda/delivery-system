<div class="modal fade" id="findCustomerModal" tabindex="-1" role="dialog"
aria-labelledby="findCustomerModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Find Customer by Contact No.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('customers.find')}}" method="post">
            @csrf
            <div class="modal-body">
                    <div class=" form-group">
                        <label for="contact">Customer Contact No.</label>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="contact" id="contact"
                            placeholder="Costumer Contact" autofocus required>
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