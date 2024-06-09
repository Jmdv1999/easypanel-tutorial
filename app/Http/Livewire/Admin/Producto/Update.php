<?php

namespace App\Http\Livewire\Admin\Producto;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $producto;

    public $descripcion;
    public $precio;
    public $stock;
    
    protected $rules = [
        'descripcion' => 'required|min:10|max:50|',
        'stock' => 'required|min:0',        
    ];

    public function mount(Producto $Producto){
        $this->producto = $Producto;
        $this->descripcion = $this->producto->descripcion;
        $this->precio = $this->producto->precio;
        $this->stock = $this->producto->stock;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Producto') ]) ]);
        
        $this->producto->update([
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.producto.update', [
            'producto' => $this->producto
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Producto') ])]);
    }
}
