<header class="page-header" role="banner">
    <!-- we need this logo when user switches to nav-function-top -->
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- DOC: nav menu layout change shortcut -->
    <div class="hidden-md-down dropdown-icon-menu position-relative">
        <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
            <i class="ni ni-menu"></i>
        </a>
        <ul>
            <li>
                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                    <i class="ni ni-minify-nav"></i>
                </a>
            </li>
            <li>
                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                    <i class="ni ni-lock-nav"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- DOC: mobile button appears during mobile width -->
    <div class="hidden-lg-up">
        <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
            <i class="ni ni-menu"></i>
        </a>
    </div>
    <div class="search">
        <form class="app-forms hidden-xs-down" role="search" action="page_search.html" autocomplete="off">
            <input type="text" id="search-field" placeholder="Search for anything" class="form-control" tabindex="1">
            <a href="#" onclick="return false;" class="btn-danger btn-search-close js-waves-off d-none" data-action="toggle" data-class="mobile-search-on">
                <i class="fal fa-times"></i>
            </a>
        </form>
    </div>
    <div class="ml-auto d-flex">
        <!-- activate app search icon (mobile) -->
        <div class="hidden-sm-up">
            <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                <i class="fal fa-search"></i>
            </a>
        </div>
        <!-- app settings -->
        <div class="hidden-md-down" data-toggle="tooltip" data-placement="bottom" data-original-title="Layout Settings" data-trigger="hover">
            <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-settings">
                <i class="fal fa-cog"></i>
            </a>
        </div>
        <!-- app darkmode -->
        <div class="hidden-md-down" id="mode-d" data-toggle="tooltip" data-placement="bottom" data-original-title="Switch to DarkMode" data-trigger="hover">
            <a href="#" class="header-icon" onClick="layouts.mode('dark');">
                <svg style="font-size:17px" data-fa-symbol="delete" class="fa-adjust fa-w-16 fa-fw" aria-hidden="true" data-prefix="fal" data-icon="adjust" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" id="delete">
                    <path fill="currentColor" d="M256 40c119.945 0 216 97.337 216 216 0 119.945-97.337 216-216 216-119.945 0-216-97.337-216-216 0-119.945 97.337-216 216-216m0-32C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm-32 124.01v247.98c-53.855-13.8-96-63.001-96-123.99 0-60.99 42.145-110.19 96-123.99M256 96c-88.366 0-160 71.634-160 160s71.634 160 160 160V96z"></path>
                </svg>
            </a>
        </div>
        <div class="hidden-md-down" id="mode-l" data-toggle="tooltip" data-placement="bottom" data-original-title="Switch to LightMode" data-trigger="hover">
            <a href="#" class="header-icon" onClick="layouts.mode('light');">
                <svg style="font-size:17px" data-fa-symbol="light-mode" class="fa-circle fa-w-16 fa-fw" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" id="delete">
                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                </svg>
            </a>
        </div>
        <div class="hidden-md-down" id="mode-n" data-toggle="tooltip" data-placement="bottom" data-original-title="Switch to Default" data-trigger="hover">
            <a href="#" class="header-icon" onClick="layouts.mode('default');">
                <svg style="font-size:17px" data-fa-symbol="normal-mode" class="fa-circle fa-w-16 fa-fw" aria-hidden="true" data-prefix="fal" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" id="delete">
                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm216 248c0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216z"></path>
                </svg>
            </a>
        </div>
        <!-- app shortcuts -->
        <div data-toggle="tooltip" data-placement="bottom" data-original-title="App Shortcuts" data-trigger="hover">
            <a href="#" class="header-icon" data-toggle="dropdown" title="My Apps">
                <i class="fal fa-cube"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated w-auto h-auto">
                <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top">
                    <h4 class="m-0 text-center color-white">
                        Quick Shortcut
                        <small class="mb-0 opacity-80">User Applications & Addons</small>
                    </h4>
                </div>
                <div class="custom-scroll h-100">
                    <ul class="app-list">
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-2 icon-stack-3x color-primary-600"></i>
                                    <i class="base-3 icon-stack-2x color-primary-700"></i>
                                    <i class="ni ni-settings icon-stack-1x text-white fs-lg"></i>
                                </span>
                                <span class="app-list-name">
                                    Services
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-2 icon-stack-3x color-primary-400"></i>
                                    <i class="base-10 text-white icon-stack-1x"></i>
                                    <i class="ni md-profile color-primary-800 icon-stack-2x"></i>
                                </span>
                                <span class="app-list-name">
                                    Account
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-9 icon-stack-3x color-success-400"></i>
                                    <i class="base-2 icon-stack-2x color-success-500"></i>
                                    <i class="ni ni-shield icon-stack-1x text-white"></i>
                                </span>
                                <span class="app-list-name">
                                    Security
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-18 icon-stack-3x color-info-700"></i>
                                    <span class="position-absolute pos-top pos-left pos-right color-white fs-md mt-2 fw-400">28</span>
                                </span>
                                <span class="app-list-name">
                                    Calendar
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-7 icon-stack-3x color-info-500"></i>
                                    <i class="base-7 icon-stack-2x color-info-700"></i>
                                    <i class="ni ni-graph icon-stack-1x text-white"></i>
                                </span>
                                <span class="app-list-name">
                                    Stats
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-4 icon-stack-3x color-danger-500"></i>
                                    <i class="base-4 icon-stack-1x color-danger-400"></i>
                                    <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                </span>
                                <span class="app-list-name">
                                    Messages
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-4 icon-stack-3x color-fusion-400"></i>
                                    <i class="base-5 icon-stack-2x color-fusion-200"></i>
                                    <i class="base-5 icon-stack-1x color-fusion-100"></i>
                                    <i class="fal fa-keyboard icon-stack-1x color-info-50"></i>
                                </span>
                                <span class="app-list-name">
                                    Notes
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-16 icon-stack-3x color-fusion-500"></i>
                                    <i class="base-10 icon-stack-1x color-primary-50 opacity-30"></i>
                                    <i class="base-10 icon-stack-1x fs-xl color-primary-50 opacity-20"></i>
                                    <i class="fal fa-dot-circle icon-stack-1x text-white opacity-85"></i>
                                </span>
                                <span class="app-list-name">
                                    Photos
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-19 icon-stack-3x color-primary-400"></i>
                                    <i class="base-7 icon-stack-2x color-primary-300"></i>
                                    <i class="base-7 icon-stack-1x fs-xxl color-primary-200"></i>
                                    <i class="base-7 icon-stack-1x color-primary-500"></i>
                                    <i class="fal fa-globe icon-stack-1x text-white opacity-85"></i>
                                </span>
                                <span class="app-list-name">
                                    Maps
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-5 icon-stack-3x color-success-700 opacity-80"></i>
                                    <i class="base-12 icon-stack-2x color-success-700 opacity-30"></i>
                                    <i class="fal fa-comment-alt icon-stack-1x text-white"></i>
                                </span>
                                <span class="app-list-name">
                                    Chat
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-5 icon-stack-3x color-warning-600"></i>
                                    <i class="base-7 icon-stack-2x color-warning-800 opacity-50"></i>
                                    <i class="fal fa-phone icon-stack-1x text-white"></i>
                                </span>
                                <span class="app-list-name">
                                    Phone
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="app-list-item hover-white">
                                <span class="icon-stack">
                                    <i class="base-6 icon-stack-3x color-danger-600"></i>
                                    <i class="fal fa-chart-line icon-stack-1x text-white"></i>
                                </span>
                                <span class="app-list-name">
                                    Projects
                                </span>
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#" class="btn btn-default mt-4 mb-2 pr-5 pl-5"> Add more apps </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>