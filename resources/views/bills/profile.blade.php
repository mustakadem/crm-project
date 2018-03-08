<div  class="modal fade" id="perfilBillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title text-primary">Bill Number #{{$bill->id}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col border">

                </div>
                <div class="col border d-flex justify-content-between">
                    <p class="h3">Client: <strong class="text-primary"><a href="{{route('customer.profile',array('username' => Auth::user()->username,'customer' => $bill->customer_id))}}">{{$bill->customer_id}}</a></strong></p>
                    <a href="{{route('customer.profile',array('username' => Auth::user()->username,'customer' => $bill->customer_id))}}"><i class="fas fa-user-circle fa-3x"></i></a>
                </div>
                <div class="col border">
                    <p class="h3">Price: <strong class="text-primary">{{$bill->price}}$</strong></p>
                    <p class="h3">Discount: <strong class="text-primary">{{ $bill['discount'] ? $bill['discount'] : '0' }}$</strong></p>
                    <p class="h3">total: <strong class="text-primary">{{$bill->total}}$</strong></p>

                </div>
            </div>
        </div>
    </div>
</div>