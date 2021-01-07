<div class="container">
    <form class="filter-form">
        <select wire:model="cat" name="category">
            <option wire:click="$emit('search')" value="Tout categorie">Tout categorie</option>
            @foreach ($categories as $category)
                <option wire:click="$emit('search')" value="{{$category->slug}}">{{$category->name}}</option>
            @endforeach
        </select>
        <select wire:model="ville" name="ville">
            <option wire:click="ville">Toute ville</option>
            @foreach ($villes as $ville)
                <option wire:click="ville" value="{{$ville->id}}">{{$ville->name}}</option>
            @endforeach
        </select>
        <select wire:model="commune" name="commune">
            <option wire:click="$emit('search')">Toute commune</option>
            @if ($communes)
            @foreach ($communes as $commune)
                <option wire:click="$emit('search')" value="{{$commune->id}}">{{$commune->name}}</option>
            @endforeach
            @endif
        </select>
        <select wire:model="price" name="prix">
            <option wire:click="$emit('search')" >Tout prix</option>
            <option wire:click="$emit('search')" value="50">-50 $</option>
            <option wire:click="$emit('search')" value="100">-100 $</option>
            <option wire:click="$emit('search')" value="150">-150 $</option>
            <option wire:click="$emit('search')" value="200">-200 $</option>
            <option wire:click="$emit('search')" value="250">-250 $</option>
            <option wire:click="$emit('search')" value="300">-300 $</option>
            <option wire:click="$emit('search')" value="300">+300 $</option>
        </select>
    </form>
</div>
</div>
