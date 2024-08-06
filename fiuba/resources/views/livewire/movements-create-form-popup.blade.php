<div class="card-body">
    <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Movimiento</h5>
                    <button wire:click="closePopUp()" type="button" class="close">
                        <span>&times;</span>
                    </button>
                </div>
                @if (session()->has('error'))
                    <div class="card-body">
                        <p class="text-sm" style="color: red;">{{ session('error') }}</p>
                    </div>
                @endif
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="person_id">Crew Member</label>
                                <select wire:model.live="person_id" id="person_id"
                                    class="form-control shadow appearance-none border rounded">
                                    <option value="">Seleccione una opcion</option>
                                    @foreach ($persons as $person)
                                        <option value="{{ $person->id }}">{{ $person->first_name }},
                                            {{ $person->last_name }}
                                        </option>
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
                                            {{ $rank->name }}
                                        </option>
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
                </div>
                <div class="action-buttons" id='btn_movement' style="padding-bottom: 1em;">
                    <button wire:click="closePopUp()" type="button" class="btn btn-block btn-outline-danger">
                        Cancelar
                    </button>
                    <button wire:click="store({{ $type_mov_id }})" type="button"
                        class="btn btn-block btn-outline-success">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
</div>
