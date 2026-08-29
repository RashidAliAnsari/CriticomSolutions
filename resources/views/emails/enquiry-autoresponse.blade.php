<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>We received your enquiry — Criticom Solutions</title>
</head>
<body style="margin:0; padding:0; background-color:#f2f3f4; font-family: Arial, Helvetica, sans-serif; color:#3e464f;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f2f3f4; padding:24px 0;">
<tr>
<td align="center">
<table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border:1px solid #cbd1d4; max-width:600px;">
<tr>
<td style="padding:24px; border-bottom:1px solid #cbd1d4;">
<p style="margin:0; font-size:12px; letter-spacing:0.12em; text-transform:uppercase; color:#1c6fb4;">Criticom Solutions</p>
<h1 style="margin:8px 0 0; font-size:20px; color:#101b26;">We've received your enquiry.</h1>
</td>
</tr>
<tr>
<td style="padding:24px;">
<p style="margin:0 0 12px;">Hello {{ $enquiry->name }},</p>
<p style="margin:0 0 12px;">
    Thank you for contacting Criticom Solutions. We've received your message and will get back to you as
    soon as possible.
</p>
<p style="margin:0 0 12px;">For reference, here is a copy of what you sent:</p>
<p style="margin:0; white-space:pre-line; color:#3e464f;">{{ $enquiry->message }}</p>
</td>
</tr>
<tr>
<td style="padding:24px; border-top:1px solid #cbd1d4;">
<p style="margin:0; font-size:13px; color:#3e464f;">
    Criticom Solutions &middot; support@criticom.net &middot; +92 305 3555 440
</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
