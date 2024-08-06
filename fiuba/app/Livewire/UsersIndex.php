<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                          ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                });
            })
            ->orderBy('id', 'asc')
            ->paginate();

            $this->resetPage();

        return view('livewire.users-index', compact('users'));
    }
}
