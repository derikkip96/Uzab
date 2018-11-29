<div class="menu-mobile menu-activated-on-click color-scheme-dark">
    <div class="mm-logo-buttons-w"><a class="mm-logo" href="#"><img src="img/logo.png"><span>{{ store_name() }}</span></a>
        <div class="mm-buttons">
            <div class="content-panel-open">
                <div class="os-icon os-icon-grid-circles"></div>
            </div>
            <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
        </div>
    </div>
    <div class="menu-and-user">
        <div class="logged-user-w">
            <div class="avatar-w"><img alt="" src="{{ asset('manage/src/img/user.png') }}"></div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">{{ Auth::user()->name }}</div>
                <div class="logged-user-role">Administrator</div>
            </div>
        </div>
        <!-------------------- START - Mobile Menu List -------------------->
        <ul class="main-menu">
            <?php $menu = \App\Helpers\Menu::portalMenu(Request::path(), true,  $shopID = isset($shopID) ? $shopID : null); ?>

            @foreach($menu as $menu_item)
                <li class="selected @if(isset($menu_item['children'])) has-sub-menu" @endif>
                    <a href="{{ $menu_item['route'] }}">
                        @if(isset($menu_item['icon']))
                            <div class="icon-w">
                                <div class="sub-menu-icon"><i class="{{ $menu_item['icon'] }}"></i></div>
                            </div>
                        @endif
                        <span>{{ $menu_item['text'] }}</span>
                    </a>
                    @if(isset($menu_item['children']))
                        <div class="sub-menu-w">
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    @foreach($menu_item['children'] as $child_menu)
                                        <li><a href="{{ $child_menu['route'] }}">{{ $child_menu['text'] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
        <!-------------------- END - Mobile Menu List -------------------->
    </div>
</div>
