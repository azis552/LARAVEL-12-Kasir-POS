{{-- sidebar --}}
    <!-- Wrapper -->
    <div class="wrapper m">
        <!-- Sidebar -->
        <div class="sidebar">
            <h5 class="p-3">Menu</h5>
                <ul>
            @foreach ($menus as $menu)
                <li>
                    <a href="{{ route($menu->slug) }}" class="{{ request()->is($menu->slug) ? 'active' : '' }}" href="{{ $menu->slug }}">{{ $menu->name }}</a>
                    @if ($menu->children->count() > 0)
                        <ul>
                            @foreach ($menu->children as $child)
                                <li><a href="{{ route($child->slug) }}" class="{{ request()->is($child->slug) ? 'active' : '' }}">{{ $child->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                
            @endforeach
                </ul>
        </div>
{{-- end sidebar --}}