<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="document">
            <div class="card">
                <div class="card-header">
                    <h3>
                        {{ $shiptravel_id ? 'Editar Buqueviaje' : 'Nuevo Buqueviaje' }}
                    </h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="shiptravel_code" class="block text-gray-700 text-sm font-bold mb-2">Codigo de buqueviaje</label>
                                    <input type="text" wire:model="shiptravel_code" class="shadow appearance-none border rounded" id="shiptravel_code">
                                    @error('shiptravel_code') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="shiptravel_boat_id" class="block text-gray-700 text-sm font-bold mb-2">Barco</label>
                                    <select wire:model="shiptravel_boat_id" id="shiptravel_boat_id" class="shadow appearance-none border rounded" >
                                        <option value="">Seleccione un barco</option>
                                        @foreach ($boats as $boat)
                                            <option value="{{ $boat->id }}">{{ $boat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('shiptravel_boat_id') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="shiptravel_arrival_date" class="block text-gray-700 text-sm font-bold mb-2">Fecha de recalada</label>
                                    <input type="date" wire:model="shiptravel_arrival_date" class="shadow appearance-none border rounded" id="shiptravel_arrival_date">
                                    @error('shiptravel_arrival_date') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @if($shiptravel_id)
                                        <select  wire:model="shiptravel_status" class="form-select form-select-lg block w-full mt-1" id="shiptravel_status">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="action-buttons mt-2">
                            <button wire:click="store()" type="button" class="btn btn-block btn-outline-success">
                                Guardar
                            </button>
                            <button wire:click="closeModal()" type="button" class="btn btn-block btn-outline-danger">
                                Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>