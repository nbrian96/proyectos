<div class="card">
    <div class="card-header d-flex align-items-center">
        <input wire:model.live="search" class="form-control flex-grow-1 me-2" placeholder="" type="text" name="">
        <i class="fas fa-search" style="padding-left: 1em;"></i>
        <div class="mt-2">
            <select wire:model.live="selectedState" id="selectedState" class="form-select form-select-lg block w-full mt-1 ml-5">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
            </select>
        </div>
    </div>

    <div class="card-body">
        <button wire:click="create()" class="btn btn-outline-primary">Nuevo Barco</button>
        @if($isOpen)
        <div class="classModal">
            @include('livewire.boats-create')
        </div>
        @endif
    </div>

    @if($boats->count())
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
        <table class="table">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nombre del buque</th>
                    <th class="px-4 py-2">Bandera</th>
                    <th class="px-4 py-2">Matrícula</th>
                    <th class="px-4 py-2">Call sign</th>
                    <th class="px-4 py-2">Armador</th>
                    <th class="px-4 py-2">Eslora total</th>
                    <th class="px-4 py-2">Tonelaje bruto y neto</th>
                    <th class="px-4 py-2">Manga</th>
                    <th class="px-4 py-2">Capacidad de pasajeros</th>
                    <th class="px-4 py-2">Capacidad de tripulantes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($boats as $boat)
                <tr>
                    <td class="border px-4 py-2">{{ $boat->id }}</td>
                    <td class="border px-4 py-2">{{ $boat->name }}</td>
                    <td class="border px-4 py-2">{{ $boat->flag }}</td>
                    <td class="border px-4 py-2">{{ $boat->registration }}</td>
                    <td class="border px-4 py-2">{{ $boat->call_sign }}</td>
                    <td class="border px-4 py-2">{{ $boat->owner }}</td>
                    <td class="border px-4 py-2">{{ $boat->total_length }}</td>
                    <td class="border px-4 py-2">{{ $boat->gross_tonnage }} / {{ $boat->net_tonnage }}</td>
                    <td class="border px-4 py-2">{{ $boat->beam }}</td>
                    <td class="border px-4 py-2">{{ $boat->passenger_capacity }}</td>
                    <td class="border px-4 py-2">{{ $boat->crew_capacity }}</td>
                    <td class="border px-4 py-2 action-column">
                        <div class="action-buttons">
                            <button wire:click="edit({{ $boat->id }})" class="btn btn-outline-primary">Editar</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $boats->links() }}
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