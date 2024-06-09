<?php

namespace App\Http\Livewire\Admin\Categorias;

use App\Models\categorias;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nombre;
    
    protected $rules = [
        'nombre' => 'required|min:10|max:50|',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Categorias') ])]);
        
        Categorias::create([
            'nombre' => $this->nombre,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.categorias.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Categorias') ])]);
    }
}
