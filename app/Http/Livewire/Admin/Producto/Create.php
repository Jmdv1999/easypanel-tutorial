<?php

namespace App\Http\Livewire\Admin\Producto;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $descripcion;
    public $precio;
    public $stock;
    
    protected $rules = [
        'descripcion' => 'required|min:10|max:50|',
        'stock' => 'required|min:0',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Producto') ])]);
        
        Producto::create([
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.producto.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Producto') ])]);
    }
}
