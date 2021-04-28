@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-4 p-2">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><a href=" {{ route('jobs.index') }} ">Postings</a></span>
                <span class="info-box-number"> {{ $jobs }} </span>
          </div>
        </div>
        </div>
        <div class="col-4 p-2">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><a href=" {{ route('admin.index') }} ">Subscribers</a></span>
                <span class="info-box-number"> {{ $subs }} </span>
            </div>
        </div>
        </div>
        <div class="col-4 p-2">
             <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Applications</span>
                    <span class="info-box-number">1,410</span>
              </div>
        </div>
        </div> 
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col-5 bg-white p-5 m-1">
          <p class="text-center">Example graph #1</p>
            <canvas id="myChart" width="400" height="300"></canvas>
        </div>
        <div class="col-6 bg-white p-5 m-1">
            <p class="text-center">Example graph #2</p>
            <canvas id="myChart2" width="400" height="300"></canvas>
        </div>
    </div>

@stop

@section('js')
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
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

<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 159, 64, 1)'
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
@endsection
