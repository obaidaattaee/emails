<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <?php
                $links = auth()->user()->links->where('parent_id',0)->where('show_in_menu',1);
            ?>
            @foreach($links as $link)
            <li class="nav-item start ">
                <a href="{{ $link->route=='#'?'#':route($link->route) }}" class="nav-link nav-toggle">
                    <i class="{{ $link->icon }}"></i>
                    <span class="title">{{ $link->title }}</span>
                    @if($link->subMenus->count()>0)
                        <span class="arrow"></span>
                    @endif
                </a>
                @if($link->subMenus->count()>0)
                    <ul class="sub-menu">
                        @foreach($link->subMenus->where('show_in_menu',1) as $subMenu)
                        <li class="nav-item start ">
                            <a href="{{ route($subMenu->route) }}" class="nav-link ">
                                <i class="{{ $subMenu->icon }}"></i>
                                <span class="title">{{ $subMenu->title }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
