<div id="movies-chart"></div>

<script>
    $(function () {
        var options = {
            chart: {
                height: 350,
                type: 'bar',
                foreColor: 'rgba(255, 255, 255, 0.85)',
                toolbar: {
                      show: false
                    }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '45%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            grid:{
                show: true,
                borderColor: 'rgba(255, 255, 255, 0.12)',
            },
            series: [
                {
                    name: 'total movies',
                    data: @json($movie->pluck('id')->toArray())
                },
            ],
            xaxis: {
                categories: @json($movie->pluck(['month'])),
            },
            colors: ["#fff", "rgba(255, 255, 255, 0.50)", "rgba(255, 255, 255, 0.25)"],
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function (val) {
                        return  val
                    }
                }
            },
			responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
						height: 330,
						stacked: true,
                    },
					legend: {
						show: !0,
						position: "top",
						horizontalAlign: "left",
						offsetX: -20,
						fontSize: "10px",
						markers: {
						  radius: 50,
						  width: 10,
						  height: 10
						}
					  },
					  plotOptions: {
						bar: {
						  columnWidth: '30%'
							}
						}
                }
            }]
        }

        var chart = new ApexCharts(
            document.querySelector("#movies-chart"),
            options
        );

        chart.render();
    });//end of document ready
</script>
