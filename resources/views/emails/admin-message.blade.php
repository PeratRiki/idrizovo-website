<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
</head>
<body style="font-family:Arial,sans-serif;margin:0;padding:24px;background:#f8fafc;">
    <div style="max-width:600px;margin:0 auto;background:#ffffff;padding:24px;border-radius:12px;box-shadow:0 4px 24px rgba(0,0,0,.08);">
        <h1 style="font-size:20px;color:#111827;margin-bottom:16px;">{{ config('app.name') }}</h1>
        <div style="font-size:16px;color:#111827;line-height:1.7;white-space:pre-wrap;">{!! nl2br(e($body)) !!}</div>
        <p style="margin-top:24px;font-size:14px;color:#6b7280;">Ова е автоматски генериран мејл од мејл панелот.</p>
    </div>
</body>
</html>

