<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject }}</title>
    <style>
        /* You can include some inline CSS here for better styling */
    </style>
</head>
<body>
<div class="email-body">
    {!! $body !!} <!-- Use !! to render the HTML content correctly -->
</div>
</body>
</html>