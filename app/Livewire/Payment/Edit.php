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

     protected $listeners = ['editPayment'];

    public function editPayment($id){
        $payment = Payment::find($id);
        $this->id = $payment->id;
        $this->note = $payment->note;
        $this->amount = $payment->amount;
        $this->date = $payment->date;
        $this->dispatch('editModal');
    }

public function updatePayment()
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

        $this->dispatch('refreshPayments');
        $this->dispatch('modalClose');       
    }

    public function render()
    {
        return view('livewire.payment.edit');
    }
}
