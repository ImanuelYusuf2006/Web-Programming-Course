<div class="navbar bg-info">
    <div class="form-check form-switch">
        <span>ID - </span>
        <input class="form-check-input" 
            type="checkbox"
            role="switch"
            {{ app()->getLocale() == 'en' ? 'checked' : '' }}
            onchange="window.location.href='{{ app()->getLocale() == 'en' ? route('language.switch', 'id') : route('language.switch', 'en') }}'">
        <span>EN</span>
    </div>

    <div class="d-flex container justify-content-end gap-2">
        <a href="" class="btn btn-primary">{{ __('main.login') }}</a>
        <a href="" class="btn btn-warning">{{ __('main.register') }}</a>
    </div>
</div>