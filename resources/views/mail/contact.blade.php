New contact form submission on {{ $site->name }} ({{ $site->domain }})

Name: {{ $data['name'] }}
Email: {{ $data['email'] }}
Phone: {{ $data['phone'] ?? '—' }}

Message:
{{ $data['message'] }}
