<!DOCTYPE html>
<html>
<head>
    <title>Route Test</title>
</head>
<body>
    <h1>Testing Route URLs</h1>
    
    <p><strong>Single date check URL:</strong></p>
    <code>{{ route('activity.check.availability') }}?activity_id=1&date=2025-08-20</code>
    
    <p><strong>Month availability check URL:</strong></p>
    <code>{{ route('activity.check.month.availability') }}?activity_id=1&start_date=2025-08-01&end_date=2025-08-31</code>
    
    <script>
        console.log('Single date URL:', '{{ route('activity.check.availability') }}?activity_id=1&date=2025-08-20');
        console.log('Month URL:', '{{ route('activity.check.month.availability') }}?activity_id=1&start_date=2025-08-01&end_date=2025-08-31');
        
        // Test fetch to single date endpoint
        fetch('{{ route('activity.check.availability') }}?activity_id=1&date=2025-08-20')
            .then(response => {
                console.log('Response status:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                document.body.innerHTML += '<div><h2>Single Date Response:</h2><pre>' + JSON.stringify(data, null, 2) + '</pre></div>';
            })
            .catch(error => {
                console.error('Error:', error);
                document.body.innerHTML += '<div><h2>Error:</h2><pre>' + error.toString() + '</pre></div>';
            });
    </script>
</body>
</html>
