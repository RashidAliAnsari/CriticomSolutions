New enquiry — {{ $enquiry->name }}

Company: {{ $enquiry->company ?: '—' }}
Email: {{ $enquiry->email }}
Phone: {{ $enquiry->phone ?: '—' }}
Sector: {{ $enquiry->sector_label ?: '—' }}
IP address: {{ $enquiry->ip_address ?: '—' }}

Message:
{{ html_entity_decode($enquiry->message) }}
