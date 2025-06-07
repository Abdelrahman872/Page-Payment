<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Livewire\Component;

class Edit extends Component
{
     public $id;
    public $note;
    public $amount;
    public $date;

     protected $listeners = ['editPayment'];   //// نفس function الزر

    public function editPayment($id){        //// نفس function الزر
        $payment = Payment::find($id);
        $this->id = $payment->id;
        $this->note = $payment->note;
        $this->amount = $payment->amount;
        $this->date = $payment->date;
        $this->dispatch('editModal');       //// لفتح الموديل ووضع القيم فيه
    }

public function updatePayment()            //// submit ال form
    {
        $this->validate([
            'amount' => 'required|numeric|min:0',
            'note' => 'nullable|string|max:255',
            'date' => 'required|date',

        ]);

        $payment = Payment::find($this->id);

        $payment->update([
            'amount' => $this->amount,
            'note' => $this->note,
            'date' => $this->date,
        ]);

        $this->dispatch('refreshPayments');    ////  لعمل تحديث لبيانات الجدول
        $this->dispatch('modalClose');        ////   لغلق الموديل بعد عمليه التحديث
    }

    public function render()
    {
        return view('livewire.payment.edit');
    }
}
