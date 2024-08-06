<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="document">
            <div class="card">
                <div class="card-header">
                    <h3>
                        {{ $client_id ? 'Editar Cliente' : 'Nuevo Cliente' }}
                    </h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="client_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre Comercial</label>
                                    <input type="text" wire:model="client_name" class="shadow appearance-none border rounded" id="client_name">
                                    @error('client_name') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="client_social_reason" class="block text-gray-700 text-sm font-bold mb-2">Razon Social</label>
                                    <input type="text" wire:model="client_social_reason" class="shadow appearance-none border rounded" id="client_social_reason">
                                    @error('client_social_reason') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="client_cuit" class="block text-gray-700 text-sm font-bold mb-2">Cuit</label>
                                    <input type="text" wire:model="client_cuit" class="shadow appearance-none border rounded" id="client_cuit">
                                    @error('client_cuit') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @if($client_id)
                                        <select  wire:model="client_status" class="form-select form-select-lg block w-full mt-1" id="client_status">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="client_email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                    <input type="text" wire:model="client_email" class="shadow appearance-none border rounded" id="client_email">
                                    @error('client_email') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="client_phone_number" class="block text-gray-700 text-sm font-bold mb-2">Numero de telefono</label>
                                    <input type="text" wire:model="client_phone_number" class="shadow appearance-none border rounded" id="client_phone_number">
                                    @error('client_phone_number') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="client_domicile" class="block text-gray-700 text-sm font-bold mb-2">Dirección</label>
                                    <input type="text" wire:model="client_domicile" class="shadow appearance-none border rounded" id="client_domicile">
                                    @error('client_domicile') <span class="text-red-500">*{{ $message }}</span>@enderror
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