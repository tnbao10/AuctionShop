@extends('store.template.layout')
@section('content')

<div class="content-wrapper">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Thống kê đơn hàng</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Thống kê</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form action="" method="get">
            <select name="year" class='form-control' style="display: inline!important;
        width: 45%!important;">
                @for ($i=$range['max'];$i>=$range['min'];$i--)
                <option value='{{$i}}' @if ($i==$request->year) selected @endif>{{$i}}</option>
                @endfor
            </select>
            <button type="submit" class="btn btn-primary">Thống kê</button>
        </form>
        <br>
        <div class="chart">
            <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
 var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
            label: 'Đơn hàng',
            data: [{{$data[1]}},{{$data[2]}},{{$data[3]}},{{$data[4]}},{{$data[5]}},{{$data[6]}},{{$data[7]}},{{$data[8]}},{{$data[9]}},{{$data[10]}},{{$data[11]}},{{$data[12]}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(220,220,220,0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(220,220,220,1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
  </script>
@endpush