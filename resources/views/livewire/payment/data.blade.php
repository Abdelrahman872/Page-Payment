<div>
    <div>

        <form wire:submit.prevent="$refresh">
            <div class="row pt-3">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class=" w-100 position-relative">

                        <input wire:model="start_date" type="date" style="padding-right: 35%;"    class="input-search2 w-100"
                        >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class=" w-100 position-relative">

                        <input wire:model="end_date" type="date" style="padding-right: 35%;"
                            class="input-search2 w-100">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <button type="submit" style="border:1px solid black;"
                            class="p-1 pe-3 ps-3 me-2 icon-container">
                            <i type="submit" style="cursor: pointer;" class="fas fa-search"></i>
                            <span class="icon-name1">بحث</span>
                        </button>
                    </form>

                        <button wire:click="resetFilters" class="p-1 pe-3 ps-3 me-2 icon-container2" style="border:1px solid black;">
                            <i type="submit" style="cursor: pointer;" class="fas fa-sync-alt"></i>
                            <span class="icon-name2">تحديث</span>
                        </button>

                        <button onclick="openModal()"  type="button"  data-bs-toggle="modal" class="p-1 pe-3 ps-3 me-2 icon-container2"
                            style="border:1px solid black;">
                            <i type="submit" style="cursor: pointer;" class="fas fa-plus"></i>
                            <span class="icon-name2">اضافه</span>
                        </button>

                    </div>
                </div>
            </div>

    </div>
    <div class="div_table mt-4">
        <table id="myTable" style="background: #ffffff; overflow: hidden; border-radius: 4px;"
            class="table text-center">
            <thead id="table-header"
                style="background: #e0e0e0; width: 82.2%; padding-top: 10px; height: 50px; border-radius: 10px 10px 0px 0px">
                <tr style="font-size: 14px;">
                    <th style="padding: 15px;" scope="col">المبلغ</th>
                    <th style="padding: 15px;" scope="col">التاريخ</th>
                    <th style="padding: 15px; width: 50%;" scope="col">البيان</th>
                    <th style="padding: 15px;" scope="col">التحكم</th>
                </tr>
            </thead>
            <tbody style=" border-top: 0px;">
@forelse ($payments as $payment)
                <tr>
                    <td>{{$payment->amount}}</td>
                    <td>{{$payment->date}}</td>
                    <td>{{$payment->note}}</td>
                    <td>


                            <!--button Modal -->
                            <button type="button" class="btn btn btn-sm" data-bs-toggle="modal" onclick="editModal()"  wire:click.prevent="$dispatch('editPayment',{id:{{ $payment->id }}})">
                                تعديل
                            </button>

                            <!--button Modal -->
                            <button type="button" onclick="deleteModal()" wire:click.prevent="$dispatch('deletePayment',{id:{{ $payment->id }}})" class="btn btn btn-sm" data-bs-toggle="modal"
                                >
                                حذف
                            </button>
                        </div>
                    </td>

                </tr>

@empty
 <tr>
    <td colspan="4" class="text-center">لا توجد بيانات</td>
        </tr>
@endforelse

            </tbody>
        </table>
        {{ $payments->links() }}
    </div>
</div>

<script>
    function openModal() {
        var modal = new bootstrap.Modal(document.getElementById('add'));
        modal.show();
    }
</script>


<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('editModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('edit'));
            modal.show();
        });
    });
</script>


<script>
    function deleteModal() {
        var modal = new bootstrap.Modal(document.getElementById('delete'));
        modal.show();
    }
</script>
