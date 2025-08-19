<!DOCTYPE html>
<html>
<head>
    <title>Availability Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Availability Check Test</h1>
    
    <div id="results"></div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resultsDiv = document.getElementById('results');
            
            // Test 1: Check what URLs are being generated
            const checkAvailabilityUrl = '{{ route('activity.check.availability') }}';
            const checkMonthUrl = '{{ route('activity.check.month.availability') }}';
            
            resultsDiv.innerHTML += '<h2>Generated URLs:</h2>';
            resultsDiv.innerHTML += '<p>Check Availability: ' + checkAvailabilityUrl + '</p>';
            resultsDiv.innerHTML += '<p>Check Month: ' + checkMonthUrl + '</p>';
            
            // Test 2: Try making actual requests
            resultsDiv.innerHTML += '<h2>Testing Requests:</h2>';
            
            // Test single date availability
            const testUrl1 = checkAvailabilityUrl + '?activity_id=1&date=2025-08-20';
            resultsDiv.innerHTML += '<p>Testing: ' + testUrl1 + '</p>';
            
            fetch(testUrl1)
                .then(response => {
                    resultsDiv.innerHTML += '<p>Response Status: ' + response.status + '</p>';
                    if (response.ok) {
                        return response.json();
                    } else {
                        return response.text().then(text => {
                            throw new Error('HTTP ' + response.status + ': ' + text.substring(0, 200) + '...');
                        });
                    }
                })
                .then(data => {
                    resultsDiv.innerHTML += '<p>✅ Success! Data: ' + JSON.stringify(data) + '</p>';
                })
                .catch(error => {
                    resultsDiv.innerHTML += '<p>❌ Error: ' + error.message + '</p>';
                    console.error('Detailed error:', error);
                });
                
            // Test month availability
            const testUrl2 = checkMonthUrl + '?activity_id=1&start_date=2025-08-01&end_date=2025-08-31';
            setTimeout(() => {
                resultsDiv.innerHTML += '<p>Testing: ' + testUrl2 + '</p>';
                
                fetch(testUrl2)
                    .then(response => {
                        resultsDiv.innerHTML += '<p>Response Status: ' + response.status + '</p>';
                        if (response.ok) {
                            return response.json();
                        } else {
                            return response.text().then(text => {
                                throw new Error('HTTP ' + response.status + ': ' + text.substring(0, 200) + '...');
                            });
                        }
                    })
                    .then(data => {
                        resultsDiv.innerHTML += '<p>✅ Month Success! Keys: ' + Object.keys(data).join(', ') + '</p>';
                    })
                    .catch(error => {
                        resultsDiv.innerHTML += '<p>❌ Month Error: ' + error.message + '</p>';
                        console.error('Detailed month error:', error);
                    });
            }, 1000);
        });
    </script>
</body>
</html>
