<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="document">
            <div class="card">
                <div class="card-header">
                    <h3>
                        {{ $person_id ? 'Editar Persona' : 'Nueva Persona' }}
                    </h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_first_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                                    <input type="text" wire:model="person_first_name" class="shadow appearance-none border rounded" id="person_first_name">
                                    @error('person_first_name') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_last_name" class="block text-gray-700 text-sm font-bold mb-2">Apellido</label>
                                    <input type="text" wire:model="person_last_name" class="shadow appearance-none border rounded" id="person_last_name">
                                    @error('person_last_name') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_passport_number" class="block text-gray-700 text-sm font-bold mb-2">Pasaporte</label>
                                    <input type="text" wire:model="person_passport_number" class="shadow appearance-none border rounded" id="person_passport_number">
                                    @error('person_passport_number') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_gender" class="block text-gray-700 text-sm font-bold mb-2">Género</label>
                                    <select wire:model="person_gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="person_gender">
                                        <option value="">Seleccionar Género</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender }}">{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                    @error('person_gender') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_phone_number" class="block text-gray-700 text-sm font-bold mb-2">Teléfono</label>
                                    <input type="text" wire:model="person_phone_number" class="shadow appearance-none border rounded" id="person_phone_number">
                                    @error('person_phone_number') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_nationality" class="block text-gray-700 text-sm font-bold mb-2">Nacionalidad</label>
                                    <input type="text" wire:model="person_nationality" class="shadow appearance-none border rounded" id="person_nationality">
                                    @error('person_nationality') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_passport_expiration" class="block text-gray-700 text-sm font-bold mb-2">Vencimiento del Pasaporte</label>
                                    <input type="date" wire:model="person_passport_expiration" class="shadow appearance-none border rounded" id="person_passport_expiration">
                                    @error('person_passport_expiration') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                    <input type="text" wire:model="person_email" class="shadow appearance-none border rounded" id="person_email">
                                    @error('person_email') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_dob" class="block text-gray-700 text-sm font-bold mb-2">DOB</label>
                                    <input type="text" wire:model="person_dob" class="shadow appearance-none border rounded" id="person_dob">
                                    @error('person_dob') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_requires_argentine_visa" class="block text-gray-700 text-sm font-bold mb-2">Requiere Visa Argentina</label>
                                    <select wire:model="person_requires_argentine_visa" class="form-select form-select-lg block w-full mt-1" id="person_requires_argentine_visa">
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('person_requires_argentine_visa') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_obtained_argentine_visa" class="block text-gray-700 text-sm font-bold mb-2">Obtuvo Visa Argentina</label>
                                    <select wire:model="person_obtained_argentine_visa" class="form-select form-select-lg block w-full mt-1" id="person_obtained_argentine_visa">
                                        <option value="0">No</option>
                                        <option value="1">Sí</option>
                                        <option value="2">En Trámite</option>
                                    </select>
                                    @error('person_obtained_argentine_visa') <span class="text-red-500">*{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    @if($person_id)
                                        <label for="person_status" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                                        <select wire:model="person_status" class="form-select form-select-lg block w-full mt-1" id="person_status">
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
