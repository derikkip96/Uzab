<div class="side-mini-panel">

    <ul class="mini-nav">
        <div class="togglediv hidden-sm-down">
            <a href="javascript:void(0)" id="togglebtn"><i class="ti-menu"></i></a>
        </div>
        <?php $menu = \App\Helpers\Menu::portalMenu(\Illuminate\Support\Facades\Request::path(), true); ?>

        @foreach($menu as $menuItem)
            <li class="selected">
                <a href="javascript:void(0)">
                    <i class="{{ $menuItem['icon'] }}"></i>
                </a>
                <div class="sidebarmenu">
                    <!-- Left navbar-header -->
                    <h3 class="menu-title">{{ $menuItem['text'] }}</h3>
                    @if(isset($menuItem['children']))
                        <ul class="sidebar-menu">
                            @foreach($menuItem['children'] as $childMenu)
                                <li><a href="{{ $childMenu['route'] }}">{{ $childMenu['text'] }}</a></li>
                            @endforeach
                        </ul>
                @endif
                <!-- Left navbar-header end -->
                </div>
            </li>
        @endforeach
    </ul>
</div>