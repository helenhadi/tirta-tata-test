<li class="nav-item">
    <a class="nav-link {{ Request::is('') ? 'active' : '' }}" href="{{ route('index') }}">
        <span class="nav-link-text">Home</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('a') ? 'active' : '' }}" href="{{ route('a.index') }}">
        <span class="nav-link-text">A</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('b') ? 'active' : '' }}" href="{{ route('b.index') }}">
        <span class="nav-link-text">B</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('c') ? 'active' : '' }}" href="{{ route('c.index') }}">
        <span class="nav-link-text">C</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('d') ? 'active' : '' }}" href="{{ route('d.index') }}">
        <span class="nav-link-text">D</span>
    </a>
</li>
{{-- <li class="nav-item">
    <div class="dropdown">
        <a class="dropdown-toggle nav-link {{ Request::is('dokumen') ? 'active' : '' }}" type="button"
            id="document-nav-dropdown" data-toggle="dropdown" aria-expanded="false">
            <span class="nav-link-text">Master</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="document-nav-dropdown">
            <li class="nav-item">
                <a class="dropdown-item py-1" href="{{ route('a.index') }}" class="nav-link">A</a>
            </li>
            <li class="nav-item">
                <a class="dropdown-item py-1" href="{{ route('b.index') }}" class="nav-link">B</a>
            </li>
            <li class="nav-item">
                <a class="dropdown-item py-1" href="{{ route('c.index') }}" class="nav-link">C</a>
            </li>
            <li class="nav-item">
                <a class="dropdown-item py-1" href="{{ route('d.index') }}" class="nav-link">D</a>
            </li>
        </ul>
    </div>
</li> --}}
