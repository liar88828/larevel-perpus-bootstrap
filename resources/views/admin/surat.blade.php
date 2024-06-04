<x-surat :role="strtolower(auth()->user()->anggota)">
    <div class="overflow-auto my-2">
        <x-table.surat :surat="$surat" />
     {{-- {{$surat->links()}} --}}
     {{ $surat->links('vendor.pagination.bootstrap-5') }}
    </div>
</x-surat>
