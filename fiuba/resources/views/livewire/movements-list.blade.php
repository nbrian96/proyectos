<div id="accordionMov{{ $type_id }}">
    @foreach ($movements as $movement)
        <div class="card card-secondary">
            <div class="card-header">
                <h4 class="card-title w-100">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseMovement{{ $movement->id }}">
                        {{ $movement->person->first_name . ', ' . $movement->person->last_name }}
                    </a>
                </h4>
            </div>
            <div id="collapseMovement{{ $movement->id }}" class="collapse" aria-expanded="false"
                data-parent="#accordionMov{{ $type_id }}">
                <div class="card-body border">
                    <div class="action-buttons">
                        <button wire:click="edit({{ $movement->id }})" class="btn btn-outline-primary">Editar
                            Movimiento</button>
                    </div>
                    <form style="padding-block: 1em;">
                        <div class="row" style="margin-bottom: 1em;">
                            <div class="col-sm-3">
                                <label>Crew Member</label>
                                <input type="text" class="form-control" disabled=""
                                    value="{{ $movement->person->first_name . ' ' . $movement->person->last_name }}">
                            </div>
                            <div class="col-sm-3">
                                <label>Rank</label>
                                <input type="text" class="form-control" disabled=""
                                    value="{{ empty($movement->rank->name) ? '' : $movement->rank->name }}">
                            </div>
                            <div class="col-sm-3">
                                <label>Cliente</label>
                                <input type="text" class="form-control" disabled=""
                                    value="{{ empty($movement->client->name) ? '' : $movement->client->name }}">
                            </div>
                            <div class="col-sm-3">
                                <label>Comentarios</label>
                                <input type="text" class="form-control" disabled=""
                                    value="{{ empty($movement->comment) ? '' : $movement->comment }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 border">
                                <h3 style="text-align: center; margin-top: .5rem;">Transfer Buenos Aires</h3>
                                <div class="row" style="padding-bottom: 1em;">
                                    <div class="col-sm-4">
                                        <label>INTL Flight</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ $movement->intl_flight }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Transfer</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->tranfer->name) ? '' : $movement->tranfer->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Proveedor</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->supplier->name) ? '' : $movement->supplier->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Hotel</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->hotel->name) ? '' : $movement->hotel->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Early/Late</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->early_late_type->name) ? '' : $movement->early_late_type->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Room</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->room->name) ? '' : $movement->room->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Noches</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ $movement->nights }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Nro de Reservacion</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ $movement->reservation_number }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Aeropuerto</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->airport->name) ? '' : $movement->airport->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Date Flight</label>
                                        <input type="datetime-local" class="form-control" disabled=""
                                            value="{{ $movement->flight_datetime }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Local Flight</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ $movement->local_flight }}">
                                    </div>
                                    <div class="col-sm-4">
                                        @if ($type_id == 1)
                                            <label>ETD Bue</label>
                                        @else
                                            <label>ETD</label>
                                        @endif
                                        <input type="datetime-local" class="form-control" disabled=""
                                            value="{{ $movement->etd }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Date Arrival</label>
                                        <input type="datetime-local" class="form-control" disabled=""
                                            value="{{ $movement->arrival_datetime }}">
                                    </div>

                                    @if ($type_id == 1)
                                        <div class="col-sm-4">
                                            <label>LOI/OKTB/ARS</label>
                                            <input type="text" class="form-control" disabled=""
                                                value="{{ empty($movement->type_procedure->name) ? '' : $movement->type_procedure->name }}">
                                        </div>
                                    @endif

                                    @if ($type_id == 2)
                                        <div class="col-sm-4">
                                            <label>Air Route</label>
                                            <input type="text" class="form-control" disabled=""
                                                value="{{ $movement->air_route }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>ETD Ush</label>
                                            <input type="datetime-local" class="form-control" disabled=""
                                                value="{{ $movement->etd_ush }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>ETA Bue</label>
                                            <input type="datetime-local" class="form-control" disabled=""
                                                value="{{ $movement->eta_datetime }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6 border">
                                <h3 style="text-align: center; margin-top: .5rem;">Transfer Local Ushuaia</h3>
                                <div class="row" style="padding-bottom: 1em;">
                                    @if ($type_id == 1)
                                        <div class="col-sm-4">
                                            <label>ETA</label>
                                            <input type="datetime-local" class="form-control" disabled=""
                                                value="{{ $movement->eta_ush_datetime }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Embark</label>
                                            <input type="datetime-local" class="form-control" disabled=""
                                                value="{{ $movement->embark_datetime }}">
                                        </div>
                                    @endif

                                    @if ($type_id == 2)
                                        <div class="col-sm-4">
                                            <label>Recon/Turist</label>
                                            <input type="text" class="form-control" disabled=""
                                                value="{{ empty($movement->type_redirection->name) ? '' : $movement->type_redirection->name }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Pick up fm Cruise</label>
                                            <input type="datetime-local" class="form-control" disabled=""
                                                value="{{ $movement->pick_up_cruise_datetime }}">
                                        </div>
                                    @endif

                                    <div class="col-sm-4">
                                        <label>Hotel</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->hotelUsh->name) ? '' : $movement->hotelUsh->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Room</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->roomUsh->name) ? '' : $movement->roomUsh->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Early/Late</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->early_late_ush_type->name) ? '' : $movement->early_late_ush_type->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Nro de Reservacion</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ $movement->reservation_number_ush }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Noches</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ $movement->nights_ush }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Transfer</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->tranferUsh->name) ? '' : $movement->tranferUsh->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Pick up Hotel</label>
                                        <input type="datetime-local" class="form-control" disabled=""
                                            value="{{ $movement->pick_up_hotel_datetime }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Proveedor</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="{{ empty($movement->supplierUsh->name) ? '' : $movement->supplierUsh->name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
