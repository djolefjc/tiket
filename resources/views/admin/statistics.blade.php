
@extends('layouts.app')

@section('content')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <?php $i = 0; ?>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Godina', 'Tiketi'],
            <?php foreach($tickets as $ticket){ ?>
            ['{{date('Y',strtotime($ticket->created_at))}}',  {{$i++}}],
            <?php } ?>

          ]);

          var options = {
            title: 'Broj tiketa po vremenskoj osi',
            curveType: 'function',
            legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

          chart.draw(data, options);
        }
      </script>
 <div class="container">
      <div id="curve_chart" style="width: 900px; height: 500px"></div>



      </div>
@endsection
