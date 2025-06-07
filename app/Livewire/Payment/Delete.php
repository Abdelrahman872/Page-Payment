<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Livewire\Component;

class Delete extends Component
{

     public $id;

    protected $listeners = ['deletePayment'];   //// نفس function الزر

    public function deletePayment($id){        //// نفس function الزر
        $this->id = $id;
    }

    public function delete()
    {

        Payment::destroy($this->id);


        $this->dispatch('refreshPayments');   ////  لعمل تحديث لبيانات الجدول
        $this->dispatch('modalClose');        ////  لغلق الموديل بعد عمليه الحذف
   }

    public function render()
    {
        return view('livewire.payment.delete');
    }
}
