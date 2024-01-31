 {{-- Delete Modal --}}
 <div class="modal fade" id="deleteModal{{ $log->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     {{-- Modal content --}}
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Sure want to Delete?
                 </h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">Select "Delete" below if you are sure to delete the
                 data.</div>
             <div class="modal-footer">
                 <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                 <form method="GET" action="{{ url('inventory-log/' . $log->id . '/delete') }}">
                     @csrf
                     <button class="btn btn-danger"
                         href="{{ url('inventory-log/' . $log->id . '/delete') }}">Delete</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
