var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        datasets: [{
            label: 'Data',
            data: [1300, 1200, 2800, 2200, 600, 1400, 1300],
            backgroundColor: [
                'rgba(75, 0, 130, 0.8)', // Deep purple color
                'rgba(75, 0, 130, 0.8)',
                'rgba(75, 0, 130, 0.8)',
                'rgba(75, 0, 130, 0.8)',
                'rgba(75, 0, 130, 0.8)',
                'rgba(75, 0, 130, 0.8)',
                'rgba(75, 0, 130, 0.8)'
            ],
            borderColor: [
                'rgba(75, 0, 130, 1)',
                'rgba(75, 0, 130, 1)',
                'rgba(75, 0, 130, 1)',
                'rgba(75, 0, 130, 1)',
                'rgba(75, 0, 130, 1)',
                'rgba(75, 0, 130, 1)',
                'rgba(75, 0, 130, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: 3000
            }
        }
    }
});