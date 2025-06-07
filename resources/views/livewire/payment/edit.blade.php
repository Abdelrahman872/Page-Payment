<div>
                     <div id="edit"  wire:ignore.self class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
          <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">اضافه</h5>
         </div>
       <div class="modal-body">
<form  wire:submit='updatePayment'>
<div class="mb-3">
    <label class="form-label">المبلغ</label>
    <input type="text" wire:model='amount' class="form-control" placeholder="ادخل المبلغ">
    @error("amount")
    <div class="text-danger">
        <p>{{ $message }}</p>
    </div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">التاريخ</label>
    <input type="date" wire:model='date' class="form-control">
    @error("date")
    <div class="text-danger">
        <p>{{ $message }}</p>
    </div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">ملاحظة</label>
    <input type="text" wire:model='note' class="form-control" placeholder="ادخل ملاحظة (اختياري)">
    @error("note")
    <div class="text-danger">
        <p>{{ $message }}</p>
    </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary w-100">تعديل</button>

</form>
           </div>
       <div class="modal-footer">


          </div>
            </div>
                </div>
          </div>

</div>

  <script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('modalClose', () => {
            const modalEl = document.getElementById('edit');
            const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modalInstance.hide();
        });
    });
</script>
