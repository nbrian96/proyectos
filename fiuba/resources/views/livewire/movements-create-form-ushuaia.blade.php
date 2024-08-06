<div class="col-sm-6 border">
    <h3 style="text-align: center; margin-top: .5rem;"> {{ $transfer_type[1] }} </h3>
    <div class="row">
        @if ($type_mov_id == 1)
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="eta_ush_datetime">ETA</label>
                    <input type="datetime-local" id="datetime" wire:model="eta_ush_datetime" class="form-control" />
                    @error('eta_ush_datetime')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="embark_datetime">Embark</label>
                    <input type="datetime-local" id="datetime" wire:model="embark_datetime" class="form-control" />
                    @error('embark_datetime')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif

        @if ($type_mov_id == 2)
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="redirection_id">Recon/Turist</label>
                    <select wire:model.live="redirection_id" id="redirection_id"
                        class="form-control shadow appearance-none border rounded">
                        <option value="">Seleccione una opcion</option>
                        @foreach ($redirection_type as $rt)
                            <option value="{{ $rt->id }}">{{ $rt->name }}</option>
                        @endforeach
                    </select>
                    @error('redirection_id')
                        <span class="span-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="pick_up_cruise_datetime">Pick up fm Cruise</label>
                    <input type="datetime-local" id="datetime" wire:model="pick_up_cruise_datetime"
                        class="form-control" />
                    @error('pick_up_cruise_datetime')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif


        <div class="col-sm-4">
            <div class="form-group">
                <label for="hotel_ush_id">Hotel</label>
                <select wire:model.live="hotel_ush_id" id="hotel_ush_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($hotels_ush as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
                @error('hotel_ush_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="room_ush_id">Room</label>
                <select wire:model.live="room_ush_id" id="room_ush_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}
                        </option>
                    @endforeach
                </select>
                @error('room_ush_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="early_late_ush_id">Early/Late</label>
                <select wire:model.live="early_late_ush_id" id="early_late_ush_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($earlyLateTypes as $earlyLateType)
                        <option value="{{ $earlyLateType->id }}">
                            {{ $earlyLateType->name }}
                        </option>
                    @endforeach
                </select>
                @error('early_late_ush_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="reservation_number_ush">Nro de Reservacion</label>
                <input type="number" id="reservation_number_ush" class="form-control" wire:model="reservation_number_ush"
                    min="0" max="9999" step="1" required>
                @error('reservation_number_ush')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="nights_ush">Noches</label>
                <input type="number" id="nights_ush" class="form-control" wire:model="nights_ush" min="0"
                    max="99" step="1" required>
                @error('nights_ush')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="tranfer_ush_id">Transfer</label>
                <select wire:model.live="tranfer_ush_id" id="tranfer_ush_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @if ($type_mov_id == 1)
                        @foreach ($tranfersUshuaiaON as $tranfer)
                            <option value="{{ $tranfer->id }}">{{ $tranfer->name }}</option>
                        @endforeach
                    @else
                        @foreach ($tranfersUshuaiaOFF as $tranfer)
                            <option value="{{ $tranfer->id }}">{{ $tranfer->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('tranfer_ush_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="pick_up_hotel_datetime">Pick up Hotel</label>
                <input type="datetime-local" id="datetime" wire:model="pick_up_hotel_datetime"
                    class="form-control" />
                @error('pick_up_hotel_datetime')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="supplier_ush_id">Proveedor</label>
                <select wire:model.live="supplier_ush_id" id="supplier_ush_id"
                    class="form-control shadow appearance-none border rounded">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
                @error('supplier_ush_id')
                    <span class="span-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
