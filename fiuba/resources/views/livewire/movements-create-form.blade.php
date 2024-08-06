<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="document">
            <div class="card">
                <div class="card-header">
                    <h3>
                        {{ $type_mov }}
                    </h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="person_id">Crew Member</label>
                                    <select wire:model.live="person_id" id="person_id"
                                        class="form-control shadow appearance-none border rounded">
                                        <option value="">Seleccione una opcion</option>
                                        @foreach ($persons as $person)
                                            <option value="{{ $person->id }}">{{ $person->first_name }},
                                                {{ $person->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('person_id')
                                        <span class="span-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="rank_id">Rank</label>
                                    <select wire:model.live="rank_id" id="rank_id"
                                        class="form-control shadow appearance-none border rounded">
                                        <option value="">Seleccione una opcion</option>
                                        @foreach ($ranks as $rank)
                                            <option value="{{ $rank->id }}" {{ $loop->first ? 'selected' : '' }}>
                                                {{ $rank->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('rank_id')
                                        <span class="span-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="client_id">Cliente</label>
                                    <select wire:model.live="client_id" id="client_id"
                                        class="form-control shadow appearance-none border rounded">
                                        <option value="">Seleccione una opcion</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <span class="span-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="comment">Comentarios</label>
                                    <input type="text" wire:model="comment"
                                        class="form-control shadow appearance-none border rounded" id="comment">
                                    @error('comment')
                                        <span class="span-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            @include('livewire.movements-create-form-bsas')
                            @include('livewire.movements-create-form-ushuaia')
                        </div>
                        <br>
                        <div class="action-buttons" id='btn_movement'>
                            <button wire:click="closeModal()" type="button" class="btn btn-block btn-outline-danger">
                                Cancelar
                            </button>
                            <button wire:click="store( {{ $type_mov_id }} )" type="button"
                                class="btn btn-block btn-outline-success">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>