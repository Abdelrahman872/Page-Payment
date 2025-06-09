<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;
class Data extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshPayments' => '$refresh'];   
public $start_date;
public $end_date;

public function resetFilters()
{
    $this->reset(['start_date', 'end_date']);
}

    public function render()
    {
$query = Payment::query();

if ($this->start_date && $this->end_date) {
    $query->whereBetween('date', [$this->start_date, $this->end_date]);
}

$payments = $query->paginate(5);
return view('livewire.payment.data', compact('payments'));
    }
}
