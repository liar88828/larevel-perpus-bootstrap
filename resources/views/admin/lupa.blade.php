<x-user :role="strtolower(auth()->user()->anggota)">
    <x-table.lupa :lupa="$lupa" />
</x-user>
