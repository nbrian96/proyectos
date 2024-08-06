<div class="card">
    <div class="card-header d-flex align-items-center">
        <div class="col-md-6">
            <input wire:model.live="search" class="form-control flex-grow-1 me-2" placeholder="Busque por nombre, apellido o email" type="text" name="">
        </div>
        <div class="col-md-6">
            <select wire:model.live="selectedState" id="selectedState" class="form-select form-select-lg block w-full mt-1 ml-5">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
            </select>
        </div>
    </div>

    <div class="card-body">
        <button wire:click="create()" class="btn btn-outline-primary">Nueva Persona</button>
        @if($isOpen)
        <div class="classModal">
            @include('livewire.persons-create')
        </div>
        @endif
    </div>

    @if($persons->count())
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
                    <th class="px-4 py-2">Nombre/Apellido</th>
                    <th class="px-4 py-2">Pasaporte</th>
                    <th class="px-4 py-2">Vencimiento Pasaporte</th>
                    <th class="px-4 py-2">Género</th>
                    <th class="px-4 py-2">Teléfono</th>
                    <th class="px-4 py-2">Nacionalidad</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">DOB</th>
                    <th class="px-4 py-2">Requiere Visa Argentina</th>
                    <th class="px-4 py-2">Obtuvo Visa Argentina</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($persons as $person)
                <tr>
                    <td class="border px-4 py-2">{{ $person->id }}</td>
                    <td class="border px-4 py-2">{{ $person->first_name }} {{ $person->last_name }}</td>
                    <td class="border px-4 py-2">{{ $person->passport_number }}</td>
                    <td class="border px-4 py-2">{{ $person->passport_expiration }}</td>
                    <td class="border px-4 py-2">{{ $person->gender }}</td>
                    <td class="border px-4 py-2">{{ $person->phone_number }}</td>
                    <td class="border px-4 py-2">{{ $person->nationality }}</td>
                    <td class="border px-4 py-2">{{ $person->email }}</td>
                    <td class="border px-4 py-2">{{ $person->dob }}</td>
                    <td class="border px-4 py-2">{{ $person->requires_argentine_visa == 1 ? 'Sí' : 'No' }}</td>
                    <td class="border px-4 py-2">
                        @if ($person->obtained_argentine_visa == 0)
                            No
                        @elseif ($person->obtained_argentine_visa == 1)
                            Sí
                        @elseif ($person->obtained_argentine_visa == 2)
                            En Trámite
                        @endif
                    </td>
                    <td class="border px-4 py-2 action-column">
                        <div class="action-buttons">
                            <button wire:click="edit({{ $person->id }})" class="btn btn-outline-primary">Editar</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
    <div class="card-footer">
        {{ $persons->links() }}
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
