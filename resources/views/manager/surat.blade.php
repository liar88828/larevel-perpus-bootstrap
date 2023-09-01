<x-surat :role="strtolower(auth()->user()->anggota)">
    <x-table.surat :surat="$surat" />
</x-surat>