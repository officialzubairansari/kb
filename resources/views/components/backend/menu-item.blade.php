@props(['item'])
@canany($item['permissions'])
<li class="nav-item">
    @isset($item['submenu'])
        <a class="nav-link menu-link {{ checkChildRoute($item['submenu']) ? 'active' : '' }}"
           href="#{{ $item['route'] }}" data-bs-toggle="collapse" role="button"
           aria-expanded="{{ checkChildRoute($item['submenu']) ? 'true' : 'false' }}"
           aria-controls="{{ $item['route'] }}">
            @if (!empty($item['icon']))
                <i class="{{ $item['icon'] }}"></i>
            @endif
            <span class="font-18 font-bold">{{ $item['title'] }}</span>
        </a>
        <div class="collapse menu-dropdown {{ checkChildRoute($item['submenu']) ? 'show' : '' }}"
             id="{{ $item['route'] }}">
            <ul class="nav nav-sm flex-column">
                @foreach($item['submenu'] as $subItem)
                    <x-backend.menu-item :item="$subItem" />
                @endforeach
            </ul>
        </div>
    @else
        <a class="nav-link menu-link {{ Route::currentRouteName() == $item['route'] ? 'active' : '' }}"
           href="{{ route($item['route']) }}">
            @if (!empty($item['icon']))
                <i class="{{ $item['icon'] }}"></i>
            @endif
            <span class="font-18 font-bold">{{ $item['title'] }}</span>
        </a>
    @endisset
</li>
@endcanany