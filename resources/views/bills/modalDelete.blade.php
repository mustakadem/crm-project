<div  class="modal fade" id="deleteBill{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary d-flex justify-content-center">

                <h4 class="modal-title  text-center">You're sure to eliminate Bill  #{{$bill->id}}?</h4>

            </div>
            <div class="modal-body d-flex justify-content-between">
                <button type="button" class=" btn btn-success bg-success" data-dismiss="modal">
                    NO
                </button>
                <form action="{{route('bill.delete',array('id' => $bill->id))}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit"  class="btn btn-danger">YES</button>
                </form>
            </div>
        </div>
    </div>
</div>