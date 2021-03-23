<li class="nav-item">
    <a class="nav-link" href="#navbar-{{ $parent['id'] }}" data-toggle="collapse" role="button" aria-expanded="false"
        aria-controls="navbar-{{ $parent['id'] }}">
        <i class="fas fa-{{ $icon }}"></i>
        <span class="nav-link-text">{{ $parent['name'] }}</span>
    </a>

    <div class="collapse" id="navbar-{{ $parent['id'] }}">
        <ul class="nav nav-sm flex-column">
            @foreach ($childs as $child)
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ $child['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</li>
