<div class="card">
    <div class="card-header">
        <form>
            <div class="row">
                <div class="col-sm-4">
                    <label>Código</label>
                    <input type="text" class="form-control" value={{ $ship_travel->code }} disabled="">
                </div>
                <div class="col-sm-4">
                    <label>Barco</label>
                    <input type="text" class="form-control" value={{ $ship_travel->boat->name }} disabled="">
                </div>
                <div class="col-sm-4">
                    <label>Fecha de Recalada</label>
                    <input type="text" class="form-control" value={{ $ship_travel->arrival_date }} disabled="">
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <button wire:click="create(1)" class="btn btn-outline-primary" style="margin-right: 0.5em;">Nuevo Mov.
            ON</button>
        <button wire:click="create(2)" class="btn btn-outline-primary">Nuevo Mov. OFF</button>
        @if ($isOpen)
            <div class="classModal">
                @include('livewire.movements-create-form')
            </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="card-body">
            <p class="text-sm">{{ session('message') }}</p>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="card-body">
            <p class="text-sm" style="color: red;">{{ session('error') }}</p>
        </div>
    @endif

    @if ($isOpenPopUp)
        @include('livewire.movements-create-form-popup')
    @endif
    <div class="card-body">
        @if (count($type_movements) > 0)
            <div>
                @foreach ($type_movements as $type_id => $movements)
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse"
                                    href="#collapseTransfer{{ $type_id }}">
                                    {{ $type[$type_id] }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTransfer{{ $type_id }}" class="collapse" aria-expanded="false">
                            <div class="card-body">
                                @if (count($movements) > 0)
                                    @include('livewire.movements-list', [
                                        'movements' => $movements,
                                        'type_id' => $type_id,
                                    ])
                                @else
                                    <strong>No hay movimientos.</strong>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <strong>No hay registros</strong>
        @endif
    </div>
</div>
