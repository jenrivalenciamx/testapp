<div class="mb-3 d-flex justify-content-between" >
    <div>
        <span>
            Mostrar

        </span>
        <select wire:model.live='cantidad'>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
        </select>
        <span>Entradas</span>
    </div>
    <div>
        <input type="text" wire:model.live='search' class="form-control" placeholder="Buscar...">
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                {{$thead}}
            </tr>
        </thead>
        <tbody>
            {{$slot}}
        </tbody>
    </table>    
</div>