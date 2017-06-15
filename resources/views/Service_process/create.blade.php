@extends('admin.layouts.template')
@section('content')


<canvas id="myChart" width="400" height="400"></canvas>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
 
	<script>
		var ctx = document.getElementById("myChart");
		var myChart = new Chart(ctx, {
			//type: 'bar',
		//type: 'line',
		type: 'bar',
		data: {
			datasets: [{
				label: <?=json_encode($labels)?>,
				data: <?=json_encode($data, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 0
			}]
		},
		options: {
			//tooltips: {enabled: false},
   			 //hover: {mode: null},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			},
			 responsive: true,
			 title: {
				display: true,
				text: 'ตัวอย่างการใช้งาน Chart Js'
			}
		}
	});
	</script>
	
	
  </body>
</html>
   
<script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {

                //              alert(5);

    });

</script>
@stop
