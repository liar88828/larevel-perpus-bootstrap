<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="row">
        <div class="col-md-6">
            <label>User Id</label>
        </div>
        <div class="col-md-6">
            <p>{{ auth()->user()->id }}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <label>Nama</label>
        </div>
        <div class="col-md-6">
            <p>{{ auth()->user()->nama }}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <label>Jenis Kelamin</label>
        </div>
        <div class="col-md-6">
            <p>{{ auth()->user()->jenisKelamin }}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <label>Email</label>
        </div>
        <div class="col-md-6">
            <p>{{ auth()->user()->email }}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <label>Tanggal Lahir</label>
        </div>
        <div class="col-md-6">
            <p>{{ auth()->user()->tanggalLahir }}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <label>Telp</label>
        </div>
        <div class="col-md-6">
            <p>{{ auth()->user()->noHp }}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <label>Anggota</label>
        </div>
        <div class="col-md-6">
            <p>{{ auth()->user()->anggota }}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <label>Divisi</label>
        </div>
        <div class="col-md-6">
            <p>{{ auth()->user()->divisi }}</p>
        </div>
    </div>
</div>
