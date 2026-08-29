<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>New enquiry — {{ $enquiry->name }}</title>
</head>
<body style="margin:0; padding:0; background-color:#f2f3f4; font-family: Arial, Helvetica, sans-serif; color:#3e464f;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f2f3f4; padding:24px 0;">
<tr>
<td align="center">
<table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border:1px solid #cbd1d4; max-width:600px;">
<tr>
<td style="padding:24px; border-bottom:1px solid #cbd1d4;">
<p style="margin:0; font-size:12px; letter-spacing:0.12em; text-transform:uppercase; color:#1c6fb4;">New enquiry</p>
<h1 style="margin:8px 0 0; font-size:20px; color:#101b26;">{{ $enquiry->name }}</h1>
</td>
</tr>
<tr>
<td style="padding:24px;">
<p style="margin:0 0 12px;"><strong>Company:</strong> {{ $enquiry->company ?: '—' }}</p>
<p style="margin:0 0 12px;"><strong>Email:</strong> {{ $enquiry->email }}</p>
<p style="margin:0 0 12px;"><strong>Phone:</strong> {{ $enquiry->phone ?: '—' }}</p>
<p style="margin:0 0 12px;"><strong>Sector:</strong> {{ $enquiry->sector_label ?: '—' }}</p>
<p style="margin:0 0 12px;"><strong>IP address:</strong> {{ $enquiry->ip_address ?: '—' }}</p>
<p style="margin:0 0 4px;"><strong>Message:</strong></p>
<p style="margin:0; white-space:pre-line;">{{ $enquiry->message }}</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
