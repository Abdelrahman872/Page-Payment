<div>
           <div class="modal fade" id="delete"  wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
          <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">الحذف</h5>
         </div>
       <div class="modal-body">
       هل انت متاكد من حذف
           </div>
       <div class="modal-footer">

       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لا</button>

             <button type="submit"  wire:click="delete" class="btn btn-outline-danger btn-sm m-1">حذف</button>

          </div>
            </div>
                </div>
          </div>
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('modalClose', () => {
            const modalEl = document.getElementById('delete');
            const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modalInstance.hide();
        });
    });
</script>
</div>


