<div class="card">
    <div class="card-header">
        <input wire:model.live="search" class="form-control" placeholder="Ingrese el nombre o email del Usuario" type="text" name="">
    </div>

    @if($users->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td width="10px">
                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $users->links() }}
    </div>
    @else
    <div class="card-body">
        <strong>No hay registros</strong>
    </div>
    @endif
</div>
