<x-user :role="strtolower(auth()->user()->anggota)">

    <div class="overflow-auto my-2">
        <x-table.user :user="$user" :role="strtolower(auth()->user()->anggota)" />
            <div class="d-flex justify-content-center">
                {{-- Halaman : {{ $user->currentPage() }} <br/>
                Jumlah Data : {{ $user->total() }} <br/>
                Data Per Halaman : {{ $user->perPage() }} <br/>
              --}}
                {{-- {{ $users->withQueryString()->links() }} --}}
                {{-- {{ $user->links() }} --}}
                {{-- {{ $users->links('vendor.pagination.bootstrap-5') }} --}}
                {{ $user->links('vendor.pagination.bootstrap-5') }}
            </div>
    </div>

</x-user>
