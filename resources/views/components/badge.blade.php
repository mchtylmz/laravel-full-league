@props([
    'status' => 'info',
    'text' => ''
])
<span @class([
        'fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill',
        'bg-primary-light text-primary' => $status == 'default',
        'bg-success-light text-success' => $status == 'success',
        'bg-warning-light text-warning' => $status == 'warning',
        'bg-info-light text-info' => $status == 'info',
        'bg-danger-light text-danger' => in_array($status, ['error', 'danger']),
])>{{ $text }}</span>
