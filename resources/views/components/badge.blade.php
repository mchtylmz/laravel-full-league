@props([
    'status' => 'info',
    'text' => ''
])
<span @class([
        'fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill',
        'bg-warning-primary text-primary' => $status == 'default',
        'bg-success-light text-success' => $status == 'success',
        'bg-warning-warning text-warning' => $status == 'warning',
        'bg-warning-info text-info' => $status == 'info',
        'bg-danger-light text-danger' => in_array($status, ['error', 'danger']),
])>{{ $text }}</span>
