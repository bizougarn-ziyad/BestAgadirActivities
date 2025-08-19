<!DOCTYPE html>
<html>
<head>
    <title>Test Route Generation</title>
</head>
<body>
    <script>
        // Test the route URL generation
        console.log('Route URL:', '{{ route('activity.check.availability') }}');
        
        // Test a fetch request
        const testUrl = `{{ route('activity.check.availability') }}?activity_id=1&date=2025-08-20`;
        console.log('Full URL:', testUrl);
        
        fetch(testUrl)
            .then(response => {
                console.log('Response status:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });
    </script>
</body>
</html>
