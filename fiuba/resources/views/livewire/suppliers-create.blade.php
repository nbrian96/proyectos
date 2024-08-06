<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="document">
            <div class="card">
                <div class="card-header">
                    <h3>
                        {{ $supplier_id ? 'Editar Proveedor' : 'Nuevo Proveedor' }}
                    </h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="supplier_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre Comercial</label>
                                    <input type="text" wire:model="supplier_name" class="shadow appearance-none border rounded" id="supplier_name">
                                    @error('supplier_name') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="supplier_social_reason" class="block text-gray-700 text-sm font-bold mb-2">Razon Social</label>
                                    <input type="text" wire:model="supplier_social_reason" class="shadow appearance-none border rounded" id="supplier_social_reason">
                                    @error('supplier_social_reason') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="supplier_cuil" class="block text-gray-700 text-sm font-bold mb-2">Cuit</label>
                                    <input type="text" wire:model="supplier_cuil" class="shadow appearance-none border rounded" id="supplier_cuil">
                                    @error('supplier_cuil') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @if($supplier_id)
                                        <select  wire:model="supplier_status" class="form-select form-select-lg block w-full mt-1" id="supplier_status">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="supplier_domicile" class="block text-gray-700 text-sm font-bold mb-2">Dirección</label>
                                    <input type="text" wire:model="supplier_domicile" class="shadow appearance-none border rounded" id="supplier_domicile">
                                    @error('supplier_domicile') <span class="text-red-500">*{{ $message }}</span>@enderror
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