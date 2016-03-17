 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 


<script src="jquery.js"></script>    
<button id="btnCall">Hacer llamada</button>
<button id="btnGraficar">Graficar</button>
<div id="divTipoCambio">
</div>


 <div id="chart_div"></div>


<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
//google.charts.setOnLoadCallback(drawAxisTickColors);

function drawAxisTickColors(data) {
      var data = google.visualization.arrayToDataTable(
      	
      		eval('('+data+')')
	       /* ['City', '2010 Population'],
	        ['New York City, NY', 8175000],
	        ['Los Angeles, CA', 3792000],
	        ['Chicago, IL', 2695000],
	        ['Houston, TX', 2099000],
        	['Philadelphia, PA', 1526000]*/
      	
      );

      var options = {
        title: 'Tipos de cambio',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Population',
          minValue: 0,
          textStyle: {
            bold: true,
            fontSize: 12,
            color: '#4d4d4d'
          },
          titleTextStyle: {
            bold: true,
            fontSize: 18,
            color: '#4d4d4d'
          }
        },
        vAxis: {
          title: 'City',
          textStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          },
          titleTextStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          }
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

  </script>
<script>
function get_value(purl, pparameters) {
    var valor = "N/A_";
    $.ajax({
        url: purl,
        type: 'POST',
        data: pparameters,
        async: false,
        cache: false,
        dataType: 'text',
        timeout: 30000,
        error: function(a, b) {
            valor = b;
        },
        success: function(msg) {
            valor = msg;
        }
    });
    return valor;
}

function get_object(purl, pparameters) {
    var t = get_value(purl, pparameters);
    var j = eval('(' + t + ')');
    return j;
}



var res='';
$(function(){
	$('#btnCall').on('click',function(){
		res=get_object('consume.php');
		$.each(res,function(k,v){
			if(v.valueDate[0]=="17/03/16" && v.title[0]=="DOLAR"){
				var car="El tipo de cambio del Dolar al dia es $"+parseFloat(v.description[0]);
				$('#divTipoCambio').empty().append(car)
			}
			//console.log(v.valueDate[0]);

		});
	});

	$('#btnGraficar').on('click',function(){
		var res=get_object('consumeBD.php');
		var cad='[["Fecha","Tipo de cambio"],';
		$.each(res,function(k,v){
			cad+='["'+v.fecha+'",'+v.tipocambio+'],';
		});
		cad = cad.substring(0, cad.length - 1);
		cad+=']';
		console.log(cad);
		drawAxisTickColors(cad);
	});
});
</script>


