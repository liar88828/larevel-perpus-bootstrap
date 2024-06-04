 <x-layout>
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

                             <a class="btn btn-success" href="{{ Route('surat-ijin.create') }}">
                                 BUAT IJIN</a>

                             <a href="{{ url('/user') }}" class="btn btn-secondary">KEMBALI</a>
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col"> No.</th>
                                         <th scope="col"> Nama</th>
                                         <th scope="col"> Hari/Tanggal</th>
                                         <th scope="col"> Keterangan</th>
                                         {{-- waktu --}}
                                         <th scope="col"> Hari Kerja</th>
                                         <th scope="col"> Mulai Pagi</th>
                                         <th scope="col"> Akhir Pagi</th>
                                         <th scope="col"> Mulai Malam</th>
                                         <th scope="col"> Akhir Malam</th>
                                         {{-- keterangan --}}
                                         <th scope="col"> Nama Manager</th>
                                         <th scope="col"> Acc Divisi</th>
                                         <th scope="col"> Status</th>
                                         <th scope="col" style="text-align: center">Aksi</th>
                                     </tr>
                                 </thead>
                                 {{-- {{ dd($surat_ijin) }} --}}
                                 <tbody>
                                     @forelse ($surat_ijin as $key=>$s)
                                         <tr>
                                             <td>{{ $s->id }}</td>
                                             <td>{{ $s->nama }}</td>
                                             <td>{{ $s->hari_tanggal }}</td>
                                             <td>{{ $s->keterangan }}</td>
                                             {{-- waktu --}}

                                             <td>{{ $s->hari_kerja }}</td>
                                             <td>{{ $s->mulai_pagi }}</td>
                                             <td>{{ $s->akhir_pagi }}</td>
                                             <td>{{ $s->mulai_malam }}</td>
                                             <td>{{ $s->akhir_malam }}</td>
                                             {{-- keterangan --}}
                                             <td>{{ $s->nama_manager }}</td>
                                             <td>
                                                 <span
                                                     class="btn bg-{{ $s->acc_divisi === 'Di Terima' ? 'info' : 'warning' }}">
                                                     {{ $s->acc_divisi }}</span>
                                             </td>


                                             <td>
                                                 <span
                                                     class="btn bg-{{ $s->acc_divisi === 'Di Terima' ? 'info' : 'warning' }}">
                                                     {{ $s->acc_divisi === 'Di Terima' ? 'Mencukupi' : 'Belum Mencukupi' }}</span>

                                             </td>

                                             <td class="text-center">
                                                 <span>
                                                     {{-- --------------------SHOW------------------------------------------------- --}}
                                                     {{-- <a href="{{ route('surat-ijin.show', $s->id) }}"
                                                    class="btn btn-sm btn-dark">
                                                    SHOW
                                                </a> --}}

                                                     {{-- --------------------DELETE------------------------------------------------- --}}
                                                     <form class='d-grid gap-1'
                                                         onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                         action="{{ route('surat-ijin.destroy', $s->id) }}"
                                                         method="POST">
                                                         @csrf
                                                         @method('DELETE')
                                                         {{-- --------------------EDIT------------------------------------------------- --}}

                                                         <a href="{{ route('surat-ijin.edit', $s->id) }}"
                                                             class="btn btn-sm btn-primary ">
                                                             EDIT
                                                         </a>

                                                         <button type="submit" class="btn btn-sm btn-danger ">
                                                             HAPUS
                                                         </button>

                                                         @if ($s->acc_divisi === 'Di Terima')
                                                             <a href="{{ url('/user/download/'.auth()->user()->id) }}"
                                                                 class="btn btn-sm btn-warning ">
                                                                 DOWNLOAD
                                                             </a>
                                                         @endif

                                                     </form>
                                                 </span>
                                             </td>
                                         </tr>
                                     @empty
                                         <div class="alert alert-danger">
                                             Data Post belum Tersedia.
                                         </div>
                                     @endforelse
                                 </tbody>
                             </table>
                             {{-- {{ $surat->links() }} --}}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </x-layout>
