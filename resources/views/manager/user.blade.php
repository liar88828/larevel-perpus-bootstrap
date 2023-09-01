<x-user :role="strtolower(auth()->user()->anggota)">
    <x-table.user :user="$user" :role="strtolower(auth()->user()->anggota)"/>
</x-user>
