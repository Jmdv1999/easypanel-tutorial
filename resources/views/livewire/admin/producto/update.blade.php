<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Producto') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.producto.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Producto')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Descripcion Input -->
            <div class='form-group'>
                <label for='input-descripcion' class='col-sm-2 control-label '> {{ __('Descripcion') }}</label>
                <input type='text' id='input-descripcion' wire:model.lazy='descripcion' class="form-control  @error('descripcion') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('descripcion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Precio Input -->
            <div class='form-group'>
                <label for='input-precio' class='col-sm-2 control-label '> {{ __('Precio') }}</label>
                <input type='number' id='input-precio' wire:model.lazy='precio' class="form-control  @error('precio') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('precio') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Stock Input -->
            <div class='form-group'>
                <label for='input-stock' class='col-sm-2 control-label '> {{ __('Stock') }}</label>
                <input type='number' id='input-stock' wire:model.lazy='stock' class="form-control  @error('stock') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('stock') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.producto.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
