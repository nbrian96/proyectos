<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-2">
                <label for="selectedtype" class="form-label">Tipo:</label></br>
                <select wire:model.live="selectedtype" id="selectedtype">
                    <option value="">Seleccione tipo</option>
                    @foreach ($type as $id => $description)
                        <option value="{{ $id }}">{{ $description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedRank" class="form-label">Rank:</label></br>
                <select wire:model.live="selectedRank" id="selectedRank">
                    <option value="">Seleccione un rank</option>
                    @foreach ($ranks as $rank)
                        <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedProcedure" class="form-label">LOI/OKTB/ARG:</label></br>
                <select wire:model.live="selectedProcedure" id="selectedProcedure">
                    <option value="">Seleccione</option>
                    @foreach ($procedureTypes as $procedureType)
                        <option value="{{ $procedureType->id }}">{{ $procedureType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedTranfer" class="form-label">Tranfer:</label></br>
                <select wire:model.live="selectedTranfer" id="selectedTranfer">
                    <option value="">Seleccione</option>
                    @foreach ($tranfers as $tranfer)
                        <option value="{{ $tranfer->id }}">{{ $tranfer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedSupplier" class="form-label">Proveedor:</label></br>
                <select wire:model.live="selectedSupplier" id="selectedSupplier">
                    <option value="">Seleccione</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedHotel" class="form-label">Hotel:</label></br>
                <select wire:model.live="selectedHotel" id="selectedHotel">
                    <option value="">Seleccione</option>
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="selectedEarlyLate" class="form-label">Early/late:</label></br>
                <select wire:model.live="selectedEarlyLate" id="selectedEarlyLate">
                    <option value="">Seleccione</option>
                    @foreach ($earlyLateTypes as $earlyLateType)
                        <option value="{{ $earlyLateType->id }}">{{ $earlyLateType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedRoom" class="form-label">Room:</label></br>
                <select wire:model.live="selectedRoom" id="selectedRoom">
                    <option value="">Seleccione</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedAirport" class="form-label">Aeropuerto:</label></br>
                <select wire:model.live="selectedAirport" id="selectedAirport">
                    <option value="">Seleccione</option>
                    @foreach ($airports as $airport)
                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedHotelUsh" class="form-label">Hotel ush:</label></br>
                <select wire:model.live="selectedHotelUsh" id="selectedHotelUsh">
                    <option value="">Seleccione</option>
                    @foreach ($ush_hotels as $ush_hotel)
                        <option value="{{ $ush_hotel->id }}">{{ $ush_hotel->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedRoomUsh" class="form-label">Room Ush:</label></br>
                <select wire:model.live="selectedRoomUsh" id="selectedRoomUsh">
                    <option value="">Seleccione</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedEarlyLateUsh" class="form-label">Early/late Ush:</label></br>
                <select wire:model.live="selectedEarlyLateUsh" id="selectedEarlyLateUsh">
                    <option value="">Seleccione</option>
                    @foreach ($earlyLateTypes as $earlyLateType)
                        <option value="{{ $earlyLateType->id }}">{{ $earlyLateType->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="selectedLocalTranfer" class="form-label">Tranfer local:</label></br>
                <select wire:model.live="selectedLocalTranfer" id="selectedLocalTranfer">
                    <option value="">Seleccione</option>
                    @foreach ($ush_tranfers as $ush_tranfer)
                        <option value="{{ $ush_tranfer->id }}">{{ $ush_tranfer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedLocalSupplier" class="form-label">Proveedor Ush:</label></br>
                <select wire:model.live="selectedLocalSupplier" id="selectedLocalSupplier">
                    <option value="">Seleccione</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedRedirection" class="form-label">Recon/turist:</label></br>
                <select wire:model.live="selectedRedirection" id="selectedRedirection">
                    <option value="">Seleccione</option>
                    @foreach ($redirectionTypes as $redirectionType)
                        <option value="{{ $redirectionType->id }}">{{ $redirectionType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="selectedShiptravel" class="form-label">BuqueViaje:</label></br>
                <select wire:model.live="selectedShiptravel" id="selectedShiptravel">
                    <option value="">Seleccione</option>
                    @foreach ($shipTravels as $shipTravel)
                        <option value="{{ $shipTravel->id }}">{{ $shipTravel->code }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Filtros de Fecha
                            </button>
                        </h4>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="startDateArrival" class="form-label">Fecha Inicio Arrival:</label></br>
                                        <input type="date" wire:model.live="startDateArrival" id="startDateArrival" class="form-control">
                                        <label for="endDateArrival" class="form-label mt-2">Fecha Fin Arrival:</label></br>
                                        <input type="date" wire:model.live="endDateArrival" id="endDateArrival" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="startDateFlight" class="form-label">Fecha Inicio Flight:</label></br>
                                        <input type="date" wire:model.live="startDateFlight" id="startDateFlight" class="form-control">
                                        <label for="endDateFlight" class="form-label mt-2">Fecha Fin Flight:</label></br>
                                        <input type="date" wire:model.live="endDateFlight" id="endDateFlight" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="startDateETD" class="form-label">Fecha Inicio ETD:</label></br>
                                        <input type="date" wire:model.live="startDateETD" id="startDateETD" class="form-control">
                                        <label for="endDateETD" class="form-label mt-2">Fecha Fin ETD:</label></br>
                                        <input type="date" wire:model.live="endDateETD" id="endDateETD" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="startDateETAUSH" class="form-label">Fecha Inicio ETA Ush:</label></br>
                                        <input type="date" wire:model.live="startDateETAUSH" id="startDateETAUSH" class="form-control">
                                        <label for="endDateETAUSH" class="form-label mt-2">Fecha Fin ETA Ush:</label></br>
                                        <input type="date" wire:model.live="endDateETAUSH" id="endDateETAUSH" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="startDatePickUpHotel" class="form-label">Fecha Inicio Pick Up Hotel:</label></br>
                                        <input type="date" wire:model.live="startDatePickUpHotel" id="startDatePickUpHotel" class="form-control">
                                        <label for="endDatePickUpHotel" class="form-label mt-2">Fecha Fin Pick Up Hotel:</label></br>
                                        <input type="date" wire:model.live="endDatePickUpHotel" id="endDatePickUpHotel" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="startDateEmbark" class="form-label">Fecha Inicio Embark:</label></br>
                                        <input type="date" wire:model.live="startDateEmbark" id="startDateEmbark" class="form-control">
                                        <label for="endDateEmbark" class="form-label mt-2">Fecha Fin Embark:</label></br>
                                        <input type="date" wire:model.live="endDateEmbark" id="endDateEmbark" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="startDatePickUpCruise" class="form-label">Fecha Inicio Pick Up Cruise:</label></br>
                                        <input type="date" wire:model.live="startDatePickUpCruise" id="startDatePickUpCruise" class="form-control">
                                        <label for="endDatePickUpCruise" class="form-label mt-2">Fecha Fin Pick Up Cruise:</label></br>
                                        <input type="date" wire:model.live="endDatePickUpCruise" id="endDatePickUpCruise" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="startDateETDUSH" class="form-label">Fecha Inicio ETD Ush:</label></br>
                                        <input type="date" wire:model.live="startDateETDUSH" id="startDateETDUSH" class="form-control">
                                        <label for="endDateETDUSH" class="form-label mt-2">Fecha Fin ETD Ush:</label></br>
                                        <input type="date" wire:model.live="endDateETDUSH" id="endDateETDUSH" class="form-control">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="startDateETA" class="form-label">Fecha Inicio ETA:</label></br>
                                        <input type="date" wire:model.live="startDateETA" id="startDateETA" class="form-control">
                                        <label for="endDateETA" class="form-label mt-2">Fecha Fin ETA:</label></br>
                                        <input type="date" wire:model.live="endDateETA" id="endDateETA" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($movements->count())
        <div class="card-body" style="overflow-x: auto;">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                    role="alert">
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
                        <th>ID</th>
                        <th>TIPO</th>
                        <th>BuqueViaje</th>
                        <th>Tripulante</th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movements as $movement)
                        <tr data-toggle="collapse" data-target="#collapse-{{ $movement->id }}" aria-expanded="false" aria-controls="collapse-{{ $movement->id }}">
                            <td>{{ $movement->id }}</td>
                            <td>{{ $movement->type == 1 ? 'ON' : 'OFF' }}</td>
                            <td>{{ $movement->ship_travel->id . '-' . $movement->ship_travel->code }}</td>
                            <td>{{ $movement->person->first_name . ' ' . $movement->person->last_name }}</td>
                            <td>{{ empty($movement->rank->name) ? '' : $movement->rank->name }}</td>
                        </tr>
                        <tr class="collapse" id="collapse-{{ $movement->id }}">
                            <td colspan="5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <th colspan="6">TRANSFER BUENOS AIRES</th>
                                            </tr>
                                            <tr>
                                                <th>Date Arrival</th>
                                                <td>{{ $movement->arrival_datetime }}</td>
                                            </tr>
                                            @if ($movement->type == 1)
                                            <tr>
                                                <th>LOI/OKTB/ARS</th>
                                                <td>{{ empty($movement->type_procedure->name) ? '' : $movement->type_procedure->name }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th>INTL Flight</th>
                                                <td>{{ $movement->intl_flight }}</td>
                                            </tr>
                                            <tr>
                                                <th>Transfer</th>
                                                <td>{{ empty($movement->tranfer->name) ? '' : $movement->tranfer->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Proveedor</th>
                                                <td>{{ empty($movement->supplier->name) ? '' : $movement->supplier->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Hotel</th>
                                                <td>{{ empty($movement->hotel->name) ? '' : $movement->hotel->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Early/late</th>
                                                <td>{{ empty($movement->early_late_type->name) ? '' : $movement->early_late_type->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Room</th>
                                                <td>{{ empty($movement->room->name) ? '' : $movement->room->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nights</th>
                                                <td>{{ $movement->nights }}</td>
                                            </tr>
                                            <tr>
                                                <th>Reservation N</th>
                                                <td>{{ $movement->reservation_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Aeropuerto</th>
                                                <td>{{ empty($movement->airport->name) ? '' : $movement->airport->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date local Flight</th>
                                                <td>{{ $movement->flight_datetime }}</td>
                                            </tr>
                                            <tr>
                                                <th>Local Flight</th>
                                                <td>{{ $movement->local_flight }}</td>
                                            </tr>
                                            <tr>
                                                <th>ETD Bue</th>
                                                <td>{{ $movement->etd }}</td>
                                            </tr>
                                            @if ($movement->type == 2)
                                            <tr>
                                                <th>ETD Ush</th>
                                                <td>{{ $movement->etd_ush }}</td>
                                            </tr>
                                            <tr>
                                                <th>Eta Bue</th>
                                                <td>{{ $movement->eta_datetime }}</td>
                                            </tr>
                                            <tr>
                                                <th>Air Route</th>
                                                <td>{{ $movement->eta_datetime }}</td>
                                            </tr>
                                            @endif
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <th colspan="6">TRANSFER LOCAL USHUAIA</th>
                                            </tr>
                                            @if ($movement->type == 2)
                                            <tr>
                                                <th>Date</th>
                                                <td>agregar campo</td>
                                            </tr>
                                            <tr>
                                                <th>Recon/turist</th>
                                                <td>{{ empty($movement->type_redirection->name) ? '' : $movement->type_redirection->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pick up fm Cruise</th>
                                                <td>{{ $movement->pick_up_cruise_datetime }}</td>
                                            </tr>
                                            @endif
                                            @if ($movement->type == 1)
                                            <tr>
                                                <th>ETA Ush</th>
                                                <td>{{ $movement->eta_ush_datetime }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th>Hotel</th>
                                                <td>{{ empty($movement->hotelUsh->name) ? '' : $movement->hotelUsh->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Room</th>
                                                <td>{{ empty($movement->roomUsh->name) ? '' : $movement->roomUsh->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Early/late</th>
                                                <td>{{ empty($movement->early_late_ush_type->name) ? '' : $movement->early_late_ush_type->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Reservation N</th>
                                                <td>{{ $movement->reservation_number_ush }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nights</th>
                                                <td>{{ $movement->nights_ush }}</td>
                                            </tr>
                                            <tr>
                                                <th>Transfer</th>
                                                <td>{{ empty($movement->tranferUsh->name) ? '' : $movement->tranferUsh->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pick up Hotel</th>
                                                <td>{{ $movement->pick_up_hotel_datetime }}</td>
                                            </tr>
                                            <tr>
                                                <th>Proveedor</th>
                                                <td>{{ empty($movement->supplierUsh->name) ? '' : $movement->supplierUsh->name }}</td>
                                            </tr>
                                            @if ($movement->type == 1)
                                            <tr>
                                                <th>Embark</th>
                                                <td>{{ $movement->embark_datetime }}</td>
                                            </tr>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <td><strong>Comments:</strong> {{ $movement->comment }}</td
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $movements->links() }}
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
