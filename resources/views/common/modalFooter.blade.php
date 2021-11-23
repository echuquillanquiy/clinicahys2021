</div>
<div class="modal-footer">

    @if($selected_id < 1)
        <button type="button" wire:click.prevent="Store()" class="btn btn-primary close-modal">GUARDAR</button>
    @else
        <button type="button" wire:click.prevent="Update()" class="btn btn-primary close-modal">ACTUALIZAR</button>
    @endif

    <button type="button" class="btn btn-danger" wire:click.prevent="resetUI()" data-dismiss="modal">CERRAR</button>
</div>
</div>
</div>
</div>
