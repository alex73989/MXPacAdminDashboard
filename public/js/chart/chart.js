/*
    ===================================
        Yearly Visitors | Options
    ===================================
*/

var yearly = {
    chart: {
        height: 230,
        type: 'bar',
        toolbar: {
            show: false,
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 1,
            color: '#515365',
            opacity: 0.3,
        }
    },
    colors: ['#fc8edf', '#c20d5a'],
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '14px',
        markers: {
            width: 10,
            height: 10,
        },
        itemMargin: {
            horizontal: 8,
            vertical: 8
        }
    },
    grid: {
        borderColor: '#f7f7f7',
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Direct',
        data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63]
    }, {
        name: 'Organic',
        data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70]
    }],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            type: 'vertical',
            shadeIntensity: 0.3,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 0.8,
            stops: [0, 100]
        }
    },
    tooltip: {
        theme: 'dark',
        y: {
            formatter: function(val) {
                return val
            }
        }
    }
}

/*
    ==============================
        Statistics | Options
    ==============================
*/



/*
    ===================================
        Monthly Visitors | Options
    ===================================
*/

var monthly = {
    chart: {
        height: 230,
        type: 'bar',
        toolbar: {
            show: false,
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 1,
            color: '#515365',
            opacity: 0.3,
        }
    },
    colors: ['#fc8edf', '#c20d5a'],
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '14px',
        markers: {
            width: 10,
            height: 10,
        },
        itemMargin: {
            horizontal: 8,
            vertical: 8
        }
    },
    grid: {
        borderColor: '#f7f7f7',
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Direct',
        data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63, 58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63, 61, 58, 63, 60, 66, 56, 63]
    }, {
        name: 'Organic',
        data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70, 91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70, 87, 105, 91, 114, 94, 66, 70, ]
    }],
    xaxis: {
        categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            type: 'vertical',
            shadeIntensity: 0.3,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 0.8,
            stops: [0, 100]
        }
    },
    tooltip: {
        theme: 'dark',
        y: {
            formatter: function(val) {
                return val
            }
        }
    }
}

/*
    ==============================
        Statistics | Options
    ==============================
*/


/*
    ===================================
        Weekly Visitors | Options
    ===================================
*/

var weekly = {
    chart: {
        height: 230,
        type: 'bar',
        toolbar: {
            show: false,
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 1,
            color: '#515365',
            opacity: 0.3,
        }
    },
    colors: ['#fc8edf', '#c20d5a'],
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '14px',
        markers: {
            width: 10,
            height: 10,
        },
        itemMargin: {
            horizontal: 8,
            vertical: 8
        }
    },
    grid: {
        borderColor: '#f7f7f7',
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Direct',
        data: [58, 44, 55, 57, 56, 61, 58]
    }, {
        name: 'Organic',
        data: [91, 76, 85, 101, 98, 87, 105]
    }],
    xaxis: {
        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sub'],
    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            type: 'vertical',
            shadeIntensity: 0.3,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 0.8,
            stops: [0, 100]
        }
    },
    tooltip: {
        theme: 'dark',
        y: {
            formatter: function(val) {
                return val
            }
        }
    }
}

/*
    ==============================
        Statistics | Options
    ==============================
*/










/*
    ==============================
    |    @Render Charts Script    |
    ==============================
*/

/*
    ===================================
        Yearly Visitors | Script
    ===================================
*/

var d_1C_3 = new ApexCharts(
    document.querySelector("#yearly"),
    yearly
);
d_1C_3.render();

/*
    ===================================
        Monthly Visitors | Script
    ===================================
*/

var d_1C_3 = new ApexCharts(
    document.querySelector("#monthly"),
    monthly
);
d_1C_3.render();

/*
    ===================================
        Weekly Visitors | Script
    ===================================
*/

var d_1C_3 = new ApexCharts(
    document.querySelector("#weekly"),
    weekly
);
d_1C_3.render();



/*
    ==============================
        Statistics | Script
    ==============================
*/

