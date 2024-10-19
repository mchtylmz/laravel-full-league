<div>
    @if(!empty($data))
        <div class="block block-rounded d-flex flex-column h-100 mb-0">
            <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                <dl class="mb-0">
                    <dt class="fs-3 fw-bold">{{ $data['count'] ?? 0 }}</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">{{ $data['description'] ?? '' }}</dd>
                </dl>
                <div class="item item-rounded-lg bg-body-light">
                    <i class="{{ $data['icon'] }} fs-3 text-info"></i>
                </div>
            </div>
            @if(!empty($data['footerText']))
                <div class="bg-body-light rounded-bottom">
                    <a class="text-dark block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="{{ $data['footerRoute'] ?? 'javascript:void(0)' }}">
                        <span>{{ $data['footerText'] }}</span>
                        <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                </div>
            @endif
        </div>
    @endif
</div>
