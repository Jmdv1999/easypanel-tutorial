<?php

namespace App\Http\Livewire\Admin\Categorias;

use App\Models\categorias;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $categorias;

    public $nombre;
    
    protected $rules = [
        'nombre' => 'required|min:10|max:50|',        
    ];

    public function mount(Categorias $Categorias){
        $this->categorias = $Categorias;
        $this->nombre = $this->categorias->nombre;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Categorias') ]) ]);
        
        $this->categorias->update([
            'nombre' => $this->nombre,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.categorias.update', [
            'categorias' => $this->categorias
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Categorias') ])]);
    }
}
