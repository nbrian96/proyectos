<div class="card">
    <div class="card-header d-flex align-items-center">
        <div class="col-md-6">
            <input wire:model.live="search" class="form-control flex-grow-1 me-2" placeholder="Coloque el nombre a buscar" type="text" name="">
        </div>
        <div class="col-md-6">
            <select wire:model.live="selectedState" id="selectedState" class="form-select form-select-lg block w-full mt-1 ml-5">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
            </select>
        </div>
    </div>

    <div class="card-body">
        <button wire:click="create()" class="btn btn-outline-primary">Nuevo Cliente</button>
        @if($isOpen)
        <div class="classModal">
            @include('livewire.clients-create')
        </div>
        @endif
    </div>

    @if($clients->count())
    <div class="card-body" style="overflow-x: auto;">
        @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            </div>
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nombre Comercial</th>
                    <th class="px-4 py-2">Razon Social</th>
                    <th class="px-4 py-2">Cuit</th>
                    <th class="px-4 py-2">Direccion</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Numero telefonico</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td class="border px-4 py-2">{{ $client->id }}</td>
                    <td class="border px-4 py-2">{{ $client->name }}</td>
                    <td class="border px-4 py-2">{{ $client->social_reason }}</td>
                    <td class="border px-4 py-2">{{ $client->cuit }}</td>
                    <td class="border px-4 py-2">{{ $client->domicile }}</td>
                    <td class="border px-4 py-2">{{ $client->email }}</td>
                    <td class="border px-4 py-2">{{ $client->phone_number }}</td>
                    <td class="border px-4 py-2 action-column">
                        <div class="action-buttons">
                            <button wire:click="edit({{ $client->id }})" class="btn btn-outline-primary">Editar</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $clients->links() }}
    </div>
    @else
    <div class="card-body">
        <strong>No hay registros</strong>
    </div>
    @endif
</div>

@section('css')
<style>
    h3 {
        font-weight: bold;
    }

    .form-group label {
        padding-right: 1em;
    }

    .form-group input {
        width: 100%;
    }

    .form-group span {
        color: red;
    }

    .classModal {
        padding: 1em;
        margin: 1em;
        background: #dfdfdf;
    }

    .card-header {
        display: flex;
        align-items: center;
    }

    .form-control {
        flex: 1;
    }

    .me-2 {
        margin-right: 0.5rem;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        /* Espacio entre los botones */
        justify-content: center;
        /* Centra los botones horizontalmente */
    }

    .action-buttons button {
        white-space: nowrap;
        /* Evita que el texto del botón se divida en múltiples líneas */
    }

    .action-column {
        width: 1%;
        /* Hace que el td no se expanda más allá de su contenido */
        white-space: nowrap;
        /* Evita que el contenido se divida en múltiples líneas */
    }

    .btn {
        width: auto !important;
        margin-left: 1em;
        margin-top: 0 !important;
    }
</style>
@stop
