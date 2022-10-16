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
                                    <h4>Dashboard</h4>
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
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @include('template.footer')
        <script>
            let dataReal = @json($dataReal);


            const data = {
                datasets: [{
                    label: 'Grafik Jumlah Peminjaman Tiap Bulan',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: dataReal,
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {}
            };
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
        <script></script>
