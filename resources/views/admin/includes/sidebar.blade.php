<style>
    .spinner {
        width: 20px;
        height: 20px;
        position: relative;
        margin: auto;
    }

    .double-bounce1,
    .double-bounce2 {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background-color: #45bc1b;
        opacity: 0.6;
        position: absolute;
        top: 0;
        left: 0;

        -webkit-animation: bounce 2.0s infinite ease-in-out;
        animation: bounce 2.0s infinite ease-in-out;
    }


    .double-bounce2 {
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
    }

    @-webkit-keyframes bounce {

        0%,
        100% {
            -webkit-transform: scale(0.0)
        }

        50% {
            -webkit-transform: scale(1.0)
        }
    }

    @keyframes bounce {

        0%,
        100% {
            transform: scale(0.0);
            -webkit-transform: scale(0.0);
        }

        50% {
            transform: scale(1.0);
            -webkit-transform: scale(1.0);
        }
    }
</style>
@php
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;
$allPermissions = Permission::pluck('id')->toArray();
@endphp

<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    {{-- @if (auth()->user()->hasAnyPermission([$allPermissions])) --}}
    <div class="app-sidebar-logo justify-content-center text-center px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('admin.dashboard') }}">
            {{-- <img alt="Logo" src="{{ $path }}assets/media/logos/default-dark.svg"
                 class="h-25px app-sidebar-logo-default" />
             <img alt="Logo" src="{{ $path }}assets/media/logos/default-small.svg"
                 class="h-20px app-sidebar-logo-minimize" /> --}}

            <span class="text-white  fs-2 fw-bold">Sunset Bookstore Co</span>
        </a>
        <!--end::Logo image-->
    </div>
    {{-- @endif --}}
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item pt-2">
                    <!--begin:Menu content-->
                    {{-- <div class="menu-content">
                         <span class="menu-heading fw-bold text-uppercase fs-7">Home</span>
                     </div> --}}
                    <!--end:Menu content-->
                </div>
                <div class="menu-item  ">
                    <!--begin:Menu link-->
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2"
                                        fill="currentColor" />
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9"
                                        rx="2" fill="currentColor" />
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9"
                                        rx="2" fill="currentColor" />
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9"
                                        rx="2" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                    <!--end:Menu link-->

                </div>

                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item  ">
                    <!--begin:Menu link-->
                    <a href="{{ route('admin.viewUsers') }}" class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <i class="bi bi-people"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">All Users</span>
                    </a>
                    <!--end:Menu link-->

                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item  ">
                    <!--begin:Menu link-->
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <i class="bi bi-collection"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">All Library</span>
                    </a>
                    <!--end:Menu link-->

                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item  ">
                    <!--begin:Menu link-->
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <i class="bi bi-book"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">All Books</span>
                    </a>
                    <!--end:Menu link-->

                </div>
                <!--end:Menu item-->

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>
