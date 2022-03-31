<div>
    <h3>Mind Drops </h3>
    
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
           <p>{{ $drop->user->name }} - {{ $drop->content }} &nbsp;
            @if($drop->likes->count())
                <?php // link com databind com o método unlike(envia o id do drop) do componente ShowDrops ?>
                <a href="#" wire:click.prevent="unlike( {{ $drop->id }} )"><i class="fa-solid fa-heart"></i></a>
            @else
                <?php // link com databind com o método like(envia o id do drop) do componente ShowDrops ?>
                <a href="#" wire:click.prevent="like( {{ $drop->id }} )"><i class="fa-regular fa-heart"></i></a>
            @endif
           </p>
        @endforeach

        <?php //Gera os links de paginação - definidos no componente ShowDrops ?>
        {{ $drops->links() }}        
    @endif
    
</div>

