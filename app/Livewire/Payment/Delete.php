<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Livewire\Component;

class Delete extends Component
{

     public $id;

    protected $listeners = ['deletePayment'];

    public function deletePayment($id){
        $this->id = $id;
    }

    public function delete()
    {

        Payment::destroy($this->id);


        $this->dispatch('refreshPayments');  
        $this->dispatch('modalClose');
   }

    public function render()
    {
        return view('livewire.payment.delete');
    }
}
