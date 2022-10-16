@include('template.header')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <div class="row ">
                                <div class="col">
                                    <h4>Pemesanan</h4>
                                </div>
                                <div class="col text-right">
                                    <button type="button" class="btn btn-primary" onclick="tambahSewa()">Tambah
                                        Pesanan</button>
                                    <a class="btn btn-primary" href="{{ route('admin.export') }}">Export Excel</a>

                                </div>

                            </div>
                            <div class="col mt-2">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $err)
                                        <p class="alert alert-danger">{{ $err }}</p>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>Nama Pegawai</th>
                                        <th>Kendaraan</th>
                                        <th>Kebutuhan BBM</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $dt)
                                        <tr>
                                            <td>
                                                {{ $no++ }}</td>
                                            <td>{{ $dt->getDriver->nama }}</td>
                                            <td>{{ $dt->getKendaraan->merk }}</td>
                                            <td>Rp. {{ number_format($dt->bbm, 2, ',', '.') }}</td>
                                            <td>
                                                @if ($dt->status == 0)
                                                    Belum Disetujui
                                                @elseif($dt->status == 7)
                                                    Selesai
                                                @else
                                                    Disetujui
                                                @endif
                                            </td>
                                            <td><button @if ($dt->status == 0 || $dt->status == 7) disabled @endif
                                                    class="btn btn-primary"
                                                    onclick="Selesai({{ $dt->id }})">Selesai
                                                    Peminjaman</button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <script>
            function tambahSewa() {

                $('#tambahSewa').appendTo("body").modal('show');
                $(".select2").select2({
                    dropdownParent: $("#tambahSewa")
                });
            }

            function Selesai(id) {
                swal({
                        title: 'Selesai Sewa',
                        text: 'Sewa telah selesai?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // console.log('tes');
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({

                                type: "POST",
                                url: "{{ route('admin.selesaisewa') }}",
                                data: {
                                    id: id
                                },
                                dataType: "JSON",
                                success: function(done) {


                                }

                            });
                            $(document).ajaxStop(function() {
                                window.location.reload();
                                // alert('tes', 'tes')
                            });

                        }
                    });
            }
        </script>
        <div class="modal fade" id="tambahSewa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sewa Kendaraan</h5>
                    </div>
                    <form action="{{ route('admin.tambahsewa') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <strong><label>Driver</label></strong>

                                <select class="select2 form-control mb-3 custom-select" name="driver"
                                    style="width: 100%; height:36px;">
                                    <option disabled selected>Driver</option>
                                    @foreach ($driver as $dr)
                                        <option value="{{ $dr->id }}">{{ $dr->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong><label>Kendaraan</label></strong>

                                <select class="select2 form-control mb-3 custom-select" name="kendaraan"
                                    style="width: 100%; height:36px;">
                                    <option disabled selected>Kendaraan</option>
                                    @foreach ($kendaraan as $kdr)
                                        <option @if ($kdr->status == 1) disabled @endif
                                            value="{{ $kdr->id }}">{{ $kdr->merk }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sewa</label>
                                <input type="text" class="form-control datetimepicker" name="tanggalSewa">
                            </div>
                            <div class="form-group">
                                <label>BBM</label>
                                <input type="text" class="form-control" name="bbm">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('template.footer')
