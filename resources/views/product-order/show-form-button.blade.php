<div class="row">
    {{-- @if (!Auth::user()->hasRole(['delivery_agent'])) --}}
    <div class="col-md-2">
        <button type="button" class="btn btn-primary mb-2 form-control" data-toggle="modal"
            data-target="#assingToDeliveryAgent">
            <i class="fa fa-share"></i> Assign to Agent
        </button>
    </div>
    {{-- @endif --}}
    <div class="col-md-2">
        <button type="button" class="btn btn-warning mb-2 form-control" data-toggle="modal"
            data-target="#comment">
            <i class="fa fa-comment"></i> Comment
        </button>
    </div>

    <div class="col-md-2">
        <button type="button" class="btn btn-success mb-2 form-control" data-toggle="modal"
            data-target="#delivered">
            <i class="fa fa-"></i> Delivered
        </button>
    </div>

    <div class="col-md-2">
        <button type="button" class="btn btn-danger mb-2 form-control" data-toggle="modal"
            data-target="#not-deliver">
            <i class="fa fa-"></i> Not-Deliver
        </button>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
@include('modal.assingToDeliveryAgentModal')
@include('modal.commentModal')
@include('modal.delivered-modal')
@include('modal.not-deliver-modal')