<div>
    <h3>Mind Drops </h3>
    <!-- <form method="post" wire:submit.prevent="create"> -->
    <form wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content">
        <?php //Mensagem de erro da validação feita no componente ShowDrops ?>
        @error('content') {{ $message }}  @enderror

        <button type="submit">Criar um Drop</button>
    </form>
    <hr>
    
    @if(count($drops) ==  0)
        <p>Nenhum Drop para ser mostrado.</p>
    @else
        @foreach($drops as $drop)
            {{ $drop->user->name }} - {{ $drop->content }}
        @endforeach

        <?php //Gera os links de paginação - definidos no componente ShowDrops ?>
        {{ $drops->links() }}        
    @endif
    
</div>

