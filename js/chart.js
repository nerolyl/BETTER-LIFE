
var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [
                  {
                    label: 'calorie',
                    data: [550, 750, 1000, 360, 246, 680, 1300],
                    backgroundColor: '#BF2E21',
                  }, 
                  {label: 'Protein',
                  data: [2360, 584, 954, 425, 316, 758, 963],
                  backgroundColor: '#F29F80',
                },
                {label: '#Carbs',
                  data: [236, 326, 623, 254, 152, 421, 854],
                  backgroundColor: '#D97236',
                },
                {label: 'Fats',
                  data: [321, 125, 645, 425, 345, 700, 120],
                  backgroundColor: '#FDC101',
                }

              ]
                
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: 3000
                    }
                }
            }
        });