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
                    <select name="user_id" id="" class="form-control">
                        <option value="">Select Delevery Agent</option>
                        @foreach ($deliveryAgents as $deliveryAgent)
                        <option value="{{$deliveryAgent->id}}">{{$deliveryAgent->name}}</option>   
                        @endforeach
                    </select>
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