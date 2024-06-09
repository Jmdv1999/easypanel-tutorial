<?php

namespace App\Http\Livewire\Admin\Categorias;

use App\Models\categorias;
use Livewire\Component;

class Single extends Component
{

    public $categorias;

    public function mount(Categorias $Categorias){
        $this->categorias = $Categorias;
    }

    public function delete()
    {
        $this->categorias->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Categorias') ]) ]);
        $this->emit('categoriasDeleted');
    }

    public function render()
    {
        return view('livewire.admin.categorias.single')
            ->layout('admin::layouts.app');
    }
}
