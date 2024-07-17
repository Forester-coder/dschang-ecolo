<!DOCTYPE html>
<html>
<head>
    <title>Payment Status</title>
</head>
<body>
    <h1>Payment Status</h1>
    <p>{{ $status['status'] }}</p>
    <p>{{ $status['reason'] ?? '' }}</p>
</body>
</html>
