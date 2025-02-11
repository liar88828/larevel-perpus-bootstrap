@props(['role'])
<x-layout>
    <div style="background: lightgray">
        <div class="d-flex justify-content-center ">
            <div style="overflow-x:scroll ">
                <div class="row">
                    <div class="">
                        <div>
                            <h3 class="text-center my-4">Table Ijin Lembur</h3>
                            <hr>
                        </div>
                        <div class="mx-4">
                            @if (session('login'))
                                <div class="card-body"></div>
                                <div class="alert alert-success px-5" role="alert">
                                    {{ session('login') }}
                                </div>
                            @elseif (session('error'))
                                <div class="card-body"></div>
                                <div class="alert alert-warning " role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="card border-0 shadow-sm rounded mx-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-5">
                                    <div class="">
                                        <a href="{{ url($role) }}" class="btn btn-secondary mx-2">KEMBALI</a>
                                    </div>

                                    <div style='display:flex; gap: 2rem'>

                                        <a href="{{ url($role . '/surat/all') }}" class="px-3 btn"
                                            style="background: lightsalmon">Semua
                                        </a>

                                        <a href="{{ url($role . '/surat/Divisi Produksi') }}"
                                            class="px-3 btn btn-primary">Divisi Produksi
                                        </a>

                                        <a href="{{ url($role . '/surat/Divisi IT') }}"
                                            class="px-3 btn btn-success">Divisi
                                            IT
                                        </a>

                                        <a href="{{ url($role . '/surat/Divisi Marketing') }}"
                                            class="px-3 btn btn-info">Divisi
                                            Marketing
                                        </a>

                                        <a href="{{ url($role . '/surat/Divisi Teknik') }}"
                                            class="px-3 btn btn-warning">Divisi
                                            Teknik
                                        </a>

                                        <a href="{{ url($role . '/surat/Divisi News') }}"
                                            class="px-3 btn btn-danger">Divisi
                                            News
                                        </a>

                                    </div>
                                </div>
                                {{-- ---------------------- iki table ---------------------- --}}
                                {{$slot}}
                                {{-- ---------------------- iki table ---------------------- --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
