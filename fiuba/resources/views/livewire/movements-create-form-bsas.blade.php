<div class="col-sm-6 border">
    <h3 style="text-align: center; margin-top: .5rem;"> {{ $transfer_type[0] }} </h3>
    <div class="row">

        <div class="col-sm-4">
            <div class="form-group">
                <label for="intl_flight">INTL Flight</label>
                <input type="text" wire:model="intl_flight" class="form-control shadow appearance-none border rounded"
                    id="intl_flight">
                @error('intl_flight')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="tranfer_id">Transfer</label>
                <select wire:model.live="tranfer_id" id="tranfer_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($tranfers as $tranfer)
                        <option value="{{ $tranfer->id }}">{{ $tranfer->name }}</option>
                    @endforeach
                </select>
                @error('tranfer_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="supplier_id">Proveedor</label>
                <select wire:model.live="supplier_id" id="supplier_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="hotel_id">Hotel</label>
                <select wire:model.live="hotel_id" id="hotel_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
                @error('hotel_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="early_late_id">Early/Late</label>
                <select wire:model.live="early_late_id" id="early_late_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($earlyLateTypes as $earlyLateType)
                        <option value="{{ $earlyLateType->id }}">
                            {{ $earlyLateType->name }}
                        </option>
                    @endforeach
                </select>
                @error('early_late_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="room_id">Room</label>
                <select wire:model.live="room_id" id="room_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}
                        </option>
                    @endforeach
                </select>
                @error('room_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="nights">Noches</label>
                <input type="number" id="nights" class="form-control" wire:model="nights" min="0"
                    max="99" step="1" required>
                @error('nights')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="reservation_number">Nro de Reservacion</label>
                <input type="number" id="reservation_number" class="form-control" wire:model="reservation_number" min="0"
                    max="9999" step="1" required>
                @error('reservation_number')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="airport_id">Aeropuerto</label>
                <select wire:model.live="airport_id" id="airport_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($airports as $airport)
                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                    @endforeach
                </select>
                @error('airport_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="flight_datetime">Date Flight</label>
                <input type="datetime-local" id="datetime" wire:model="flight_datetime" class="form-control" />
                @error('flight_datetime')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="local_flight">Local Flight</label>
                <input type="text" wire:model="local_flight"
                    class="form-control shadow appearance-none border rounded" id="local_flight">
                @error('local_flight')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                @if ($type_mov_id == 1)
                    <label for="etd">ETD Bue</label>
                @else
                    <label for="etd">ETD</label>
                @endif
                <input type="datetime-local" id="datetime" wire:model="etd" class="form-control" />
                @error('etd')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="arrival_datetime">Date Arrival</label>
                <input type="datetime-local" id="datetime" wire:model="arrival_datetime" class="form-control" />
                @error('arrival_datetime')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        @if ($type_mov_id == 1)
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="procedure_id">LOI/OKTB/ARS</label>
                    <select wire:model.live="procedure_id" id="procedure_id"
                        class="form-control shadow appearance-none border rounded">
                        <option value="">Seleccione una opcion</option>
                        @foreach ($procedureTypes as $procedureType)
                            <option value="{{ $procedureType->id }}">
                                {{ $procedureType->name }}</option>
                        @endforeach
                    </select>
                    @error('procedure_id')
                        <span class="span-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif


        @if ($type_mov_id == 2)
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="air_route">Air Route</label>
                    <input type="text" wire:model="air_route"
                        class="form-control shadow appearance-none border rounded" id="air_route">
                    @error('air_route')
                        <span class="span-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="etd_ush">ETD Ush</label>
                    <input type="datetime-local" id="datetime" wire:model="etd_ush" class="form-control" />
                    @error('etd_ush')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="eta_datetime">ETA Bue</label>
                    <input type="datetime-local" id="datetime" wire:model="eta_datetime" class="form-control" />
                    @error('eta_datetime')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
    </div>
</div>
