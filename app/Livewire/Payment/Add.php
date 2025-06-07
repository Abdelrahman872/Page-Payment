<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Livewire\Component;

class Add extends Component
{
    public $amount;
    public $date;
    public $note;


    public function add(){
        $Data = $this->validate([
            'amount'  => 'required|numeric|min:0',
            'date'  => 'required|date',
            'note'  => 'required|string',
        ]);

        Payment::create($Data);
        $this->dispatch('refreshPayments');          ////  لعمل تحديث لبيانات الجدول
        $this->reset(['amount', 'date' ,'note']);     ////  لعمل تفريغ لبيانات الموديل

        $this->dispatch('modalClose');             ////  لغلق الموديل بعد عمليه الحذف
    }
    public function render()
    {
        return view('livewire.payment.add');
    }
}
