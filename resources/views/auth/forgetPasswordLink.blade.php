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
                             <div class="card-body ">

                                 <div class="d-flex justify-content-between px-5">
                                     <div class="">
                                         <a href="{{ url($role) }}" class="btn btn-secondary mx-2">KEMBALI</a>
                                     </div>
                                 </div>

                                 <table class="table table-bordered">
                                     <thead>
                                         <tr>
                                             <th scope="col"> No.</th>
                                             <th scope="col"> Nama</th>
                                             <th scope="col"> Email</th>
                                             <th scope="col"> No Hp</th>
                                             <th scope="col"> Anggota</th>
                                             <th scope="col"> Divisi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @forelse ($user as $key=>$u)
                                             <tr>
                                                 <td>{{ $key + 1 }}</td>
                                                 <td>{{ $u->nama }}</td>
                                                 <td>{{ $u->email }}</td>
                                                 <td>{{ $u->noHp }}</td>
                                                 <td>{{ $u->anggota }}</td>
                                                 <td>{{ $u->divisi }}</td>
                                                 <td class="text-center">
                                                     <a href="{{ route('surat-ijin.edit', $u->id) }}"
                                                         class="btn btn-sm btn-primary btn-lg btn-block mb-1">EDIT PASSWORD
                                                     </a>
                                                 </td>
                                             </tr>
                                         @empty
                                             <div class="alert alert-danger">
                                                 Data Post belum Tersedia.
                                             </div>
                                         @endforelse
                                     </tbody>
                                 </table>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </x-layout>
