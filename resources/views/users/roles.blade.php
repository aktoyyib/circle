<x-livewire-tables::table.cell> 
    {{ ucfirst($row->id) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell> 
    {{ ucfirst($row->firstname) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell> 
    {{ ucfirst($row->lastname) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->email }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
     @if(!empty($row->getRoleNames()))
        @foreach($row->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ date('F d, Y', strtotime($row->created_at)) }}
</x-livewire-tables::table.cell>  