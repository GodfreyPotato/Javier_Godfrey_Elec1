<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="d-flex justify-content-center align-items-center flex-column py-4">
    <h2>User Registrations Per Month</h2>
    <div style="width:80%; height: 60%;"><canvas id="usersChart" width="400" height="200"></canvas></div>
    <script>
        const ctx = document.getElementById('usersChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_map(fn($m) => date("F", mktime(0, 0, 0, $m, 10)), array_keys($usersPerMonth->toArray()))) !!},
                datasets: [{
                    label: 'Users',
                    data: {{ json_encode(array_values($usersPerMonth->toArray())) }},
                    backgroundColor: 'rgba(75, 192, 192, 0.4)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>

</html>