<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class DeleteUser extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }
    public function delete()
    {
        abort_if(Gate::denies('admin-access'), Response::HTTP_FORBIDDEN);
        $this->user->delete();
        session()->flash('success', 'User Deleted');
        return redirect(route('users.index'));
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <button class="btn btn-danger"
                    wire:click="delete({{ $user->id }})"
                    onclick="confirm('If you delete this user it will automatically delete all his posts. Are you sure?') || event.stopImmediatePropagation()"
                    title="Delete">
                    <i class="fas fa-trash-alt"></i>
            </button>
            </div>
        blade;
    }
}
