jQuery(document).ready(function () {
    "use strict";
    window.chartColors = {
        white: 'rgb(255,255,255)',
        red: 'rgb(255, 121, 121)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 206, 46)',
        green: 'rgb(75, 192, 192)',
        blues: 'rgba(3, 169, 245,.3)',
        info_clr_bg: 'rgba(94, 183, 255,.7)',
        info_clr_brdr: 'rgb(94, 183, 255)',
        info_two_clr_bg: 'rgba(131, 233, 210,.7)',
        info_two_clr_brdr: 'rgb(131, 233, 210)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(231,233,237)',
        oranges: 'rgba(254,87,34,.4)',
        orange: 'rgb(254,87,34)',
    };
    var customTooltips = function (tooltip) {
        $(this._chart.canvas).css("cursor", "pointer");

        var positionY = this._chart.canvas.offsetTop;
        var positionX = this._chart.canvas.offsetLeft;

        $(".chartjs-tooltip").css({
            opacity: 0,
        });

        if (!tooltip || !tooltip.opacity) {
            return;
        }

        if (tooltip.dataPoints.length > 0) {
            tooltip.dataPoints.forEach(function (dataPoint) {
                var content = [dataPoint.xLabel, dataPoint.yLabel].join(": ");
                var $tooltip = $("#tooltip-" + dataPoint.datasetIndex);

                $tooltip.html(content);
                $tooltip.css({
                    opacity: 1,
                    top: positionY + dataPoint.y + "px",
                    left: positionX + dataPoint.x + "px",
                });
            });
        }
    };

    window.randomScalingFactor = function () {
        return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
    }

    var lineChartData = {
        labels: ["Jan", "Mar", "May", "Jul", "Sap", "Nov"],
        datasets: [{
            label: "Wordpress",
            backgroundColor: window.chartColors.info_two_clr_bg,
            borderColor: window.chartColors.info_two_clr_brdr,
            pointBackgroundColor: window.chartColors.white,
            data: [
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor()
		]
	}, {
            label: "HTML",
            backgroundColor: window.chartColors.info_clr_bg,
            borderColor: window.chartColors.info_clr_brdr,
            pointBackgroundColor: window.chartColors.white,
            data: [
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor()
		]
	}]

    };

    var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var color = Chart.helpers.color;
    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: 'First dataset',
            backgroundColor: window.chartColors.info_clr_bg,
            borderColor: window.chartColors.info_clr_brdr,
            borderWidth: 2,
            data: [
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor()
		]
	}, {
            label: 'Second dataset',
            backgroundColor: window.chartColors.info_two_clr_bg,
            borderColor: window.chartColors.info_two_clr_brdr,
            borderWidth: 2,
            data: [
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor(),
			randomScalingFactor()
		]
	}]

    };


    var color = Chart.helpers.color;
    var radarChart = {
        type: 'radar',
        data: {
            labels: ["Eating", "Drinking", "Playing", "Sleeping", "Designing", "Coding", "Running"],
            datasets: [{
                label: "First dataset",
                backgroundColor: window.chartColors.info_clr_bg,
                borderColor: window.chartColors.info_clr_brdr,
                pointBackgroundColor: window.chartColors.info_clr_brdr,
                pointBorderColor: window.chartColors.white,
                data: [
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor()
			]
		}, {
                label: "Second dataset",
                backgroundColor: window.chartColors.info_two_clr_bg,
                borderColor: window.chartColors.info_two_clr_brdr,
                pointBackgroundColor: window.chartColors.info_two_clr_brdr,
                pointBorderColor: window.chartColors.white,
                data: [
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor()
			]
		}, ]
        },
        options: {
            legend: {
                position: 'top',
            },
            title: {
                display: false,
                text: 'Chart.js Radar Chart'
            },
            scale: {
                ticks: {
                    beginAtZero: true
                }
            }
        }
    };

    var pieChart = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor()
			],
                backgroundColor: [
				window.chartColors.info_clr_brdr,
				window.chartColors.info_two_clr_brdr,
				window.chartColors.yellow,
				window.chartColors.red
			],
                label: 'Dataset 1'
		}],
            labels: [
			"Blue",
			"Sky",
			"Yellow",
			"Red"
		]
        },
        options: {
            responsive: true
        }
    };

    var polarChart = {
        data: {
            datasets: [{
                data: [
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor()
			],
                backgroundColor: [
				window.chartColors.info_clr_brdr,
				window.chartColors.info_two_clr_brdr,
				window.chartColors.yellow,
				window.chartColors.red
			],
                label: 'My dataset' // for legend
		}],
            labels: [
			"Blue",
			"Sky",
			"Yellow",
			"Red"
		]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: false,
                text: 'Chart.js Polar Area Chart'
            },
            scale: {
                ticks: {
                    beginAtZero: true
                },
                reverse: false
            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    };

    var doghuntChart = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor()
			],
                backgroundColor: [
				window.chartColors.info_clr_brdr,
				window.chartColors.info_two_clr_brdr,
				window.chartColors.yellow,
				window.chartColors.red
			],
                label: 'Dataset 1'
		}],
            labels: [
			"Blue",
			"Sky",
			"Yellow",
			"Red"
		]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: false,
                text: 'Chart.js Doughnut Chart'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };

    var doghuntChart2 = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor()
			],
                borderWidth: 10,
                hoverBorderWidth: 10,
                hoverChartWidth: 15,
                hoverBorderColor: window.chartColors.white,
                borderColor: window.chartColors.white,
                backgroundColor: [

				window.chartColors.info_two_clr_brdr,
				window.chartColors.red,
				window.chartColors.info_clr_brdr
			],
                label: 'Dataset 1'
		}],
            labels: [
			"Products Sold",
			"Products Returned",
			"Got Reviews"
		]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
                labels: {
                    padding: 10,
                    boxWidth: 10,
                }
            },
            title: {
                display: false,
                text: 'Chart.js Doughnut Chart'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };

    $(window).on('load', function () {
        var line_chart = $("#line_chart");
        var chart = new Chart(line_chart, {
            type: "line",
            data: lineChartData,
            options: {
                title: {
                    display: false,
                    text: "Chart.js - Custom Tooltips using Data Points"
                },
                tooltips: {
                    enabled: true,
                    mode: 'index',
                    intersect: false,
                    custom: customTooltips
                },
                legend: {
                    labels: {
                        padding: 20,
                        boxWidth: 10,
                    }
                }
            }
        });

        if ($('#bar_chart').length > 0) {
            var ctx1 = $("#bar_chart")[0].getContext("2d");
            window.myBar = new Chart(ctx1, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,

                    title: {
                        display: false
                    }
                }
            });
        }
        if ($("#plar_chart").length > 0) {
            var ctx3 = $("#plar_chart");
            window.myPolarArea = Chart.PolarArea(ctx3, polarChart);
        }
        if ($("#rader_chart").length > 0) {
            window.myRadar = new Chart($("#rader_chart"), radarChart);
        }
        if ($('#pie_chart').length > 0) {
            var ctx2 = $("#pie_chart")[0].getContext("2d");
            window.myPie = new Chart(ctx2, pieChart);
        }
        if ($('#doghunt_chart').length > 0) {
            var ctx4 = $("#doghunt_chart")[0].getContext("2d");
            window.myDoughnut = new Chart(ctx4, doghuntChart);
        }
        if ($('#doghunt_chart_2').length > 0) {
            var ctx4 = $("#doghunt_chart_2")[0].getContext("2d");
            window.myDoughnut = new Chart(ctx4, doghuntChart2);
        }
    });
});
