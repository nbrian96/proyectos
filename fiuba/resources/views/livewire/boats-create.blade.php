<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="document">
            <div class="card">
                <div class="card-header">
                    <h3>
                        {{ $boat_id ? 'Editar Barco' : 'Nuevo Barco' }}
                    </h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="boat_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del buque</label>
                                    <input type="text" wire:model="boat_name" class="shadow appearance-none border rounded" id="boat_name">
                                    @error('boat_name') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="boat_flag" class="block text-gray-700 text-sm font-bold mb-2">Bandera</label>
                                    <input type="text" wire:model="boat_flag" class="shadow appearance-none border rounded" id="boat_flag">
                                    @error('boat_flag') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="boat_registration" class="block text-gray-700 text-sm font-bold mb-2">Matrícula</label>
                                    <input type="text" wire:model="boat_registration" class="shadow appearance-none border rounded" id="boat_registration">
                                    @error('boat_registration') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="boat_call_sign" class="block text-gray-700 text-sm font-bold mb-2">Call sign</label>
                                    <input type="text" wire:model="boat_call_sign" class="shadow appearance-none border rounded" id="boat_call_sign">
                                    @error('boat_call_sign') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="boat_owner" class="block text-gray-700 text-sm font-bold mb-2">Armador</label>
                                    <input type="text" wire:model="boat_owner" class="shadow appearance-none border rounded" id="boat_owner">
                                    @error('boat_owner') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="boat_total_length" class="block text-gray-700 text-sm font-bold mb-2">Eslora total</label>
                                    <input type="text" wire:model="boat_total_length" class="shadow appearance-none border rounded" id="boat_total_length">
                                    @error('boat_total_length') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="boat_gross_tonnage" class="block text-gray-700 text-sm font-bold mb-2">Tonelaje bruto</label>
                                    <input type="text" wire:model="boat_gross_tonnage" class="shadow appearance-none border rounded" id="boat_gross_tonnage">
                                    @error('boat_gross_tonnage') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="boat_net_tonnage" class="block text-gray-700 text-sm font-bold mb-2">Tonelaje neto</label>
                                    <input type="text" wire:model="boat_net_tonnage" class="shadow appearance-none border rounded" id="boat_net_tonnage">
                                    @error('boat_net_tonnage') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="boat_beam" class="block text-gray-700 text-sm font-bold mb-2">Manga</label>
                                    <input type="text" wire:model="boat_beam" class="shadow appearance-none border rounded" id="boat_beam">
                                    @error('boat_beam') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="boat_passenger_capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacidad de pasajeros</label>
                                    <input type="number" wire:model="boat_passenger_capacity" min="0" max="999" step="1" class="shadow appearance-none border rounded" id="boat_passenger_capacity">
                                    @error('boat_passenger_capacity') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="boat_crew_capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacidad de tripulantes</label>
                                    <input type="number" wire:model="boat_crew_capacity" min="0" max="999" step="1" class="shadow appearance-none border rounded" id="boat_crew_capacity">
                                    @error('boat_crew_capacity') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            @if($boat_id)
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="boat_status" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                                    <select wire:model="boat_status" class="form-select form-select-lg block w-full mt-1" id="boat_status">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                    @error('boat_status') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="action-buttons">
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