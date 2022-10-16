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
                                    <h4>Penyewaan Kendaraan</h4>
                                </div>
                                <div class="col text-right">


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
                                            <td>{{ $dt->nama }}</td>
                                            <td>{{ $dt->getSewa()->first()->getKendaraan->merk }}</td>
                                            <td>Rp. {{ number_format($dt->getSewa()->first()->bbm, 2, ',', '.') }}</td>
                                            <td>
                                                @if ($dt->getSewa()->first()->status == 0)
                                                    Belum Disetujui
                                                @elseif($dt->getSewa()->first()->status == 7)
                                                    Selesai
                                                @else
                                                    Disetujui
                                                @endif
                                            </td>
                                            <td><button @if ($dt->getSewa()->first()->status == 1 || $dt->getSewa()->first()->status == 7) disabled @endif
                                                    class="btn btn-primary"
                                                    onclick="Setuju({{ $dt->getSewa()->first()->id }})">Setuju</button>
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
            function Setuju(id) {
                swal({
                        title: 'Persetujuan Sewa',
                        text: 'Yakin Menyetujui Penyewaan?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({

                                type: "POST",
                                url: "{{ route('penyetuju.tambahsewa') }}",
                                data: {
                                    id: id
                                },
                                dataType: "JSON",
                                success: function(result) {
                                    // console.log(result);
                                    $(document).ajaxStop(function() {
                                        window.location.reload();

                                    });

                                }

                            });

                        }
                    });
            }
        </script>
        @include('template.footer')
