var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: 'calorie',
                    data: [1300, 1200, 2800, 2200, 600, 1400, 1300],
                    backgroundColor: '#5A246B',
                    borderColor: 'rgba(75, 0, 130, 1)',
                    
                }]
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