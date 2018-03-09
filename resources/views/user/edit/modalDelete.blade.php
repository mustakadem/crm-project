<div  class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary d-flex justify-content-center">

                <h4 class="modal-title  text-center">Oopps {{Auth::user()->name}}</h4>

            </div>
            <div class="modal-body text-center ">
                <p>Are you sure you want to delete your account?</p>
                <div class="d-flex justify-content-between">
                    <button type="button" class=" btn btn-success bg-success" data-dismiss="modal">
                        NO
                    </button>
                    <form action="{{route('user.delete',array('id' => Auth::user()->id))}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit"  class="btn btn-danger">YES</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>