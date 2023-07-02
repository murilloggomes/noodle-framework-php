<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/css');
?>	

@charset "UTF-8";

body[data-leftbar-theme=dark] {
  --ct-bg-leftbar: #464f5b !important;
  --ct-dark-menu-item: #fff !important;
  --ct-dark-menu-item-hover: #fff !important;
  --ct-dark-menu-item-active: #fff !important;
}

body[data-leftbar-theme=default] {
  --ct-bg-leftbar: <?php echo  $_COOKIE['cor_principal'] ?> !important;
  --ct-bg-leftbar-gradient: linear-gradient(135deg, <?php echo  $_COOKIE['cor_principal'] ?> 0, <?php echo  $_COOKIE['cor_secundaria'] ?> 60%) !important;
  --ct-form-check-input-checked-border-color: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  --ct-menu-item: #fff !important;
  --ct-menu-item-hover: #fff !important;
  --ct-menu-item-active: #fff !important;
}

body[data-leftbar-theme=light] {
  --ct-bg-leftbar: <?php echo  $_COOKIE['cor_principal'] ?> !important;
  --ct-menu-item: #fff !important;
  --ct-menu-item-hover: #fff !important;
  --ct-menu-item-active: #fff !important;
}

body[data-layout-color=dark] {
  --ct-body-bg: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  --ct-body-color: #fff !important
  --ct-link-color: #fff !important
  --ct-link-hover-color: <?php echo  $_COOKIE['cor_principal'] ?> !important;
  --ct-border-color: #464f5b;
  --ct-box-shadow: 0px 0px 35px 0px rgba(49, 57, 66, 0.5);
  --ct-box-shadow-sm: 0 .125rem .25rem rgba(0, 0, 0, 0.075);
  --ct-box-shadow-lg: 0 0 45px 0 rgba(0, 0, 0, 0.12);
  --ct-box-shadow-inset: inset 0 1px 2px rgba(0, 0, 0, 0.075);
  --ct-component-active-color: #fff;
  --ct-component-active-bg: <?php echo  $_COOKIE['cor_principal'] ?> !important;
  --ct-text-muted: #8391a2;
  --ct-blockquote-footer-color: #ced4da;
  --ct-mark-bg: #fcf8e3;
  --ct-table-color: #aab8c5;
  --ct-table-bg: transparent;
  --ct-table-accent-bg: transparent;
  --ct-table-striped-color: #aab8c5;
  --ct-table-striped-bg: rgba(64, 73, 84, 0.8);
  --ct-table-active-color: var(--ct-table-color);
  --ct-table-active-bg: rgba(70, 79, 91, 0.4);
  --ct-table-hover-color: var(--ct-table-color);
  --ct-table-hover-bg: #404954;
  --ct-table-border-color: #464f5b;
  --ct-table-group-separator-color: #515c69;
  --ct-table-caption-color: var(--ct-text-muted);
  --ct-input-btn-focus-color: rgba(114, 124, 245, 0.25);
  --ct-btn-active-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
  --ct-btn-link-color: var(--ct-link-color);
  --ct-btn-link-hover-color: var(--ct-link-hover-color);
  --ct-btn-link-disabled-color: #aab8c5;
  --ct-form-text-color: var(--ct-text-muted);
  --ct-input-bg: #404954;
  --ct-input-disabled-bg: #37404a;
  --ct-input-color: #e3eaef;
  --ct-input-border-color: #4a525d;
  --ct-input-box-shadow: var(--ct-box-shadow-inset);
  --ct-input-focus-bg: #464f5b;
  --ct-input-focus-border-color: #555f6b;
  --ct-input-focus-color: var(--ct-input-color);
  --ct-input-placeholder-color: #adb5bd;
  --ct-input-plaintext-color: #6c757d;
  --ct-form-check-input-bg: transparent;
  --ct-form-check-input-border: 1px solid #4a525d;
  --ct-form-check-input-checked-color: var(--ct-component-active-color);
  --ct-form-check-input-checked-bg-color: var(--ct-component-active-bg);
  --ct-form-check-input-checked-border-color: var(--ct-form-check-input-checked-bg-color);
  --ct-form-check-input-indeterminate-color: var(--ct-component-active-color);
  --ct-form-check-input-indeterminate-bg-color: var(--ct-component-active-bg);
  --ct-form-check-input-indeterminate-border-color: var(--ct-component-active-bg);
  --ct-form-switch-color: #dee2e6;
  --ct-input-group-addon-color: var(--ct-input-color);
  --ct-input-group-addon-bg: #48515d;
  --ct-input-group-addon-border-color: var(--ct-input-border-color);
  --ct-form-select-color: var(--ct-input-color);
  --ct-form-select-bg: var(--ct-input-bg);
  --ct-form-select-disabled-color: #ced4da;
  --ct-form-select-disabled-bg: #37404a;
  --ct-form-select-disabled-border-color: ;
  --ct-form-select-indicator-color: #e3eaef;
  --ct-form-range-track-bg: #464f5b;
  --ct-form-range-track-box-shadow: inset 0 .25rem .25rem rgba(0, 0, 0, 0.1);
  --ct-form-range-thumb-box-shadow: 0 .1rem .25rem rgba(0, 0, 0, 0.1);
  --ct-form-range-thumb-active-bg: #d5d8fc;
  --ct-form-range-thumb-disabled-bg: #aab8c5;
  --ct-form-file-button-color: var(--ct-input-color);
  --ct-form-file-button-bg: #48515d;
  --ct-form-file-button-hover-bg: #434b56;
  --ct-nav-link-disabled-color: #ced4da;
  --ct-nav-tabs-border-color: #464f5b;
  --ct-nav-tabs-link-hover-border-color: #37404a #37404a var(--ct-nav-tabs-border-color);
  --ct-nav-tabs-link-active-color: #e3eaef;
  --ct-nav-tabs-link-active-bg: #4a525d;
  --ct-nav-tabs-link-active-border-color: #464f5b #464f5b var(--ct-nav-tabs-link-active-bg);
  --ct-navbar-dark-color: rgba(255, 255, 255, 0.55);
  --ct-navbar-dark-hover-color: rgba(255, 255, 255, 0.75);
  --ct-navbar-dark-active-color: #fff;
  --ct-navbar-dark-disabled-color: rgba(255, 255, 255, 0.25);
  --ct-navbar-dark-toggler-border-color: rgba(255, 255, 255, 0.1);
  --ct-navbar-light-color: #d3d7db;
  --ct-navbar-light-hover-color: #e3eaef;
  --ct-navbar-light-active-color: rgba(255, 255, 255, 0.9);
  --ct-navbar-light-disabled-color: #aab8c5;
  --ct-dropdown-color: #aab8c5;
  --ct-dropdown-bg: #3b444e;
  --ct-dropdown-border-color: #434b55;
  --ct-dropdown-divider-bg: #4d5662;
  --ct-dropdown-box-shadow: var(--ct-box-shadow);
  --ct-dropdown-link-color: #aab8c5;
  --ct-dropdown-link-hover-color: #d9d9d9;
  --ct-dropdown-link-hover-bg: #48515d;
  --ct-dropdown-link-active-color: #fff;
  --ct-dropdown-link-active-bg: #7a8089;
  --ct-dropdown-link-disabled-color: #ced4da;
  --ct-dropdown-dark-color: #464f5b;
  --ct-dropdown-dark-bg: #e3eaef;
  --ct-dropdown-dark-border-color: var(--ct-dropdown-border-color);
  --ct-dropdown-dark-divider-bg: var(--ct-dropdown-divider-bg);
  --ct-dropdown-dark-link-color: var(--ct-dropdown-dark-color);
  --ct-dropdown-dark-link-hover-color: #fff;
  --ct-dropdown-dark-link-hover-bg: rgba(255, 255, 255, 0.15);
  --ct-dropdown-dark-link-active-color: var(--ct-dropdown-link-active-color);
  --ct-dropdown-dark-link-active-bg: var(--ct-dropdown-link-active-bg);
  --ct-dropdown-dark-link-disabled-color: #aab8c5;
  --ct-dropdown-dark-header-color: #aab8c5;
  --ct-pagination-color: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;;
  --ct-pagination-bg: #fff;
  --ct-pagination-border-color: #464f5b;
  --ct-pagination-focus-color: var(--ct-link-hover-color);
  --ct-pagination-focus-bg: #37404a;
  --ct-pagination-focus-box-shadow: 0 0 0 0.2rem var(--ct-input-btn-focus-color);
  --ct-pagination-hover-color: #f1f1f1;
  --ct-pagination-hover-bg: #474f58;
  --ct-pagination-hover-border-color: #464f5b;
  --ct-pagination-disabled-color: #8391a2;
  --ct-pagination-disabled-bg: #4a555f;
  --ct-pagination-disabled-border-color: #4a555f;
  --ct-card-border-color: rgba(0, 0, 0, 0.125);
  --ct-card-box-shadow: var(--ct-box-shadow);
  --ct-card-cap-bg: #464f5b;
  --ct-card-bg: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;;
  --ct-accordion-color: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;;
  --ct-accordion-border-color: rgba(0, 0, 0, 0.125);
  --ct-accordion-button-active-bg: #f1f2fe;
  --ct-accordion-button-active-color: #6770dd;
  --ct-accordion-button-focus-border-color: var(--ct-input-focus-border-color);
  --ct-accordion-button-focus-box-shadow: 0 0 0 0.2rem var(--ct-input-btn-focus-color);
 	--ct-tooltip-color: #f1f3fa;
  --ct-tooltip-bg: #dee2e6;
  --ct-popover-bg: #fff;
  --ct-popover-border-color: #464f5b;
  --ct-popover-header-bg: #3c4651;
  --ct-popover-header-color: #dee2e6;
  --ct-popover-body-color: #dee2e6;
  --ct-popover-arrow-color: #fff;
  --ct-popover-arrow-outer-color: #464f5b;
  --ct-toast-background-color: #404954;
  --ct-toast-border-color: rgba(241, 241, 241, 0.12);
  --ct-toast-header-background-color: rgba(64, 73, 84, 0.2);
  --ct-toast-header-border-color: rgba(241, 241, 241, 0.05);
  --ct-badge-color: #fff;
  --ct-modal-content-bg: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  --ct-modal-content-box-shadow-xs: var(--ct-box-shadow-sm);
  --ct-modal-content-box-shadow-sm-up: var(--ct-box-shadow);
  --ct-modal-backdrop-bg: #aab8c5;
  --ct-modal-header-border-color: #515c69;
  --ct-modal-footer-border-color: #515c69;
  --ct-progress-bg: #464f5b;
  --ct-progress-box-shadow: var(--ct-box-shadow-inset);
  --ct-progress-bar-color: #fff;
  --ct-modal-content-bg: #fff;
  --ct-list-group-color: #f1f1f1;
  --ct-list-group-bg: var(--ct-card-bg);
  --ct-list-group-border-color: #4d5662;
  --ct-list-group-hover-bg: #404954;
  --ct-list-group-disabled-color: #8391a2;
  --ct-list-group-disabled-bg: #404954;
  --ct-list-group-action-color: #aab8c5;
  --ct-list-group-action-active-color: #dee2e6;
  --ct-list-group-action-active-bg: #404954;
  --ct-thumbnail-bg: #464f5b;
  --ct-thumbnail-border-color: #464f5b;
  --ct-thumbnail-box-shadow: var(--ct-box-shadow-sm);
  --ct-figure-caption-color: #ced4da;
  --ct-breadcrumb-divider-color: #8391a2;
  --ct-breadcrumb-active-color: #aab8c5;
  --ct-carousel-control-color: #fff;
  --ct-carousel-indicator-active-bg: #fff;
  --ct-carousel-caption-color: #fff;
  --ct-carousel-dark-indicator-active-bg: #000;
  --ct-carousel-dark-caption-color: #000;
  --ct-btn-close-color: #e3eaef;
  --ct-code-color: <?php echo  $_COOKIE['cor_principal'] ?> !important;
  --ct-kbd-color: #fff;
  --ct-kbd-bg: #f1f1f1;
  --ct-pre-color: #aab8c5;
  --ct-bg-leftbar: #3a444e;
  --ct-menu-item: #cedce4;
  --ct-menu-item-hover: #fff;
  --ct-menu-item-active: #fff;
  --ct-bg-topbar: #3a444e;
  --ct-bg-topbar-search: #464f5b;
  --ct-nav-user-bg-topbar: #45515d;
  --ct-nav-user-border-topbar: #4a5764;
  --ct-bg-dark-topbar: #3a444e;
  --ct-bg-dark-topbar-search: #464f5b;
  --ct-nav-user-bg-dark-topbar: #45515d; linear-gradient(135deg, #8f75da 0, #727cf5 60%);
  --ct-nav-user-border-dark-topbar: #4a5764;
  --ct-rightbar-bg: #000 !important;
  --ct-rightbar-title-bg: <?php echo  $_COOKIE['cor_principal'] ?> !important;
  --ct-rightbar-title-color: #fff;
  --ct-rightbar-title-btn-bg: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;;
  --ct-rightbar-title-btn-color: #fff;
  --ct-rightbar-overlay-bg: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  --ct-bg-detached-leftbar: #000 !important;
  --ct-bg-leftbar-gradient: linear-gradient(135deg, <?php echo  $_COOKIE['cor_principal'] ?> 0, <?php echo  $_COOKIE['cor_secundaria'] ?> 60%) !important;
  --ct-bg-topnav: linear-gradient(to bottom, <?php echo  $_COOKIE['cor_principal'] ?>, <?php echo  $_COOKIE['cor_secundaria'] ?>);
  --ct-boxed-layout-bg: #fff;
  --ct-help-box-light-bg: rgba(255, 255, 255, 0.1);
  --ct-help-box-dark-bg: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  --ct-nav-pills-bg: #404954;
  --ct-custom-accordion-title-color: #8391a2;
  --ct-dragula-bg: #404954;
  --ct-form-wizard-header-bg: #404954;
  --ct-text-title-color: #fff;
  --ct-page-title-color: #fff;
  --ct-card-loader-bg: #f1f1f1;
  --ct-chat-primary-user-bg: #404954;
  --ct-chat-secondary-user-bg: #404954;
  --ct-auth-bg: #404954;
  --ct-apex-grid-color: #404954;
  --ct-hero-bg: linear-gradient(to bottom, <?php echo  $_COOKIE['cor_principal'] ?> !important;, <?php echo  $_COOKIE['cor_principal'] ?> !important;);
}

body[data-layout-color=dark][data-layout=detached] {
  --ct-menu-item: #000;
  --ct-menu-item-hover:<?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  --ct-menu-item-active:<?php echo  $_COOKIE['cor_secundaria'] ?> !important;

body[data-leftbar-theme=light] .help-box {
  background-color: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
}
body[data-leftbar-theme=light] .logo.logo-light {
  display: none;
}
body[data-leftbar-theme=light] .logo.logo-dark {
  display: block;
}


body[data-leftbar-theme=light] .leftside-menu {
  background: <?php echo  $_COOKIE['cor_principal'] ?> !important;
}
body[data-leftbar-theme=light] .leftside-menu .logo {
  background: <?php echo  $_COOKIE['cor_principal'] ?> !important;
}
body[data-leftbar-theme=light] .side-nav .side-nav-link {
  color: var(--ct-menu-item);
}
body[data-leftbar-theme=light] .side-nav .side-nav-link:hover, body[data-leftbar-theme=light] .side-nav .side-nav-link:focus, body[data-leftbar-theme=light] .side-nav .side-nav-link:active {
  color: var(--ct-menu-item-hover);
}
body[data-leftbar-theme=light] .side-nav .menuitem-active > a {
  color: var(--ct-menu-item-active) !important;
}
body[data-leftbar-theme=light] .side-nav .side-nav-title {
  color: var(--ct-menu-item);
}
body[data-leftbar-theme=light] .side-nav .side-nav-second-level li a,
body[data-leftbar-theme=light] .side-nav .side-nav-third-level li a,
body[data-leftbar-theme=light] .side-nav .side-nav-forth-level li a {
  color: var(--ct-menu-item);
}
body[data-leftbar-theme=light] .side-nav .side-nav-second-level li a:focus, body[data-leftbar-theme=light] .side-nav .side-nav-second-level li a:hover,
body[data-leftbar-theme=light] .side-nav .side-nav-third-level li a:focus,
body[data-leftbar-theme=light] .side-nav .side-nav-third-level li a:hover,
body[data-leftbar-theme=light] .side-nav .side-nav-forth-level li a:focus,
body[data-leftbar-theme=light] .side-nav .side-nav-forth-level li a:hover {
  color: var(--ct-menu-item-hover);
}
body[data-leftbar-theme=light] .side-nav .side-nav-second-level li.active > a,
body[data-leftbar-theme=light] .side-nav .side-nav-third-level li.active > a,
body[data-leftbar-theme=light] .side-nav .side-nav-forth-level li.active > a {
  color: var(--ct-menu-item-active);
}
body[data-leftbar-theme=light][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item .side-nav-link:hover, body[data-leftbar-theme=light][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item .side-nav-link:active, body[data-leftbar-theme=light][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item .side-nav-link:focus {
  color: var(--ct-menu-item-hover);
}
body[data-leftbar-theme=light][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover .side-nav-link {
  background: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  color: #fff !important;
  -webkit-transition: none;
  transition: none;
}
body[data-leftbar-theme=light][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover > ul {
  background: var(--ct-bg-leftbar);
  -webkit-box-shadow: var(--ct-box-shadow);
          box-shadow: var(--ct-box-shadow);
}
body[data-leftbar-theme=light][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover > ul a:hover {
  color: var(--ct-menu-item-hover);
}
body[data-leftbar-theme=light][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover > .collapse > ul,
body[data-leftbar-theme=light][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover > .collapsing > ul {
  background: var(--ct-bg-leftbar);
}
body[data-leftbar-theme=light][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover > .collapse > ul a:hover,
body[data-leftbar-theme=light][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover > .collapsing > ul a:hover {
  color: var(--ct-menu-item-hover);
}

body[data-leftbar-theme=dark] .leftside-menu {
  background: #000;
}
body[data-leftbar-theme=dark] .leftside-menu .logo {
  background: var(--ct-bg-leftbar) !important;
}
body[data-leftbar-theme=dark] .side-nav .side-nav-link {
  color: var(--ct-dark-menu-item);
}
body[data-leftbar-theme=dark] .side-nav .side-nav-link:hover, body[data-leftbar-theme=dark] .side-nav .side-nav-link:focus, body[data-leftbar-theme=dark] .side-nav .side-nav-link:active {
  color: var(--ct-dark-menu-item-hover);
}
body[data-leftbar-theme=dark] .side-nav .menuitem-active > a {
  color: var(--ct-dark-menu-item-active) !important;
}
body[data-leftbar-theme=dark] .side-nav .side-nav-title {
  color: var(--ct-dark-menu-item);
}
body[data-leftbar-theme=dark] .side-nav .side-nav-second-level li a,
body[data-leftbar-theme=dark] .side-nav .side-nav-third-level li a,
body[data-leftbar-theme=dark] .side-nav .side-nav-forth-level li a {
  color: var(--ct-dark-menu-item);
}
body[data-leftbar-theme=dark] .side-nav .side-nav-second-level li a:focus, body[data-leftbar-theme=dark] .side-nav .side-nav-second-level li a:hover,
body[data-leftbar-theme=dark] .side-nav .side-nav-third-level li a:focus,
body[data-leftbar-theme=dark] .side-nav .side-nav-third-level li a:hover,
body[data-leftbar-theme=dark] .side-nav .side-nav-forth-level li a:focus,
body[data-leftbar-theme=dark] .side-nav .side-nav-forth-level li a:hover {
  color: var(--ct-dark-menu-item-hover);
}
body[data-leftbar-theme=dark] .side-nav .side-nav-second-level li.active > a,
body[data-leftbar-theme=dark] .side-nav .side-nav-third-level li.active > a,
body[data-leftbar-theme=dark] .side-nav .side-nav-forth-level li.active > a {
  color: var(--ct-dark-menu-item-active);
}
body[data-leftbar-theme=dark][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item .side-nav-link:hover, body[data-leftbar-theme=dark][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item .side-nav-link:active, body[data-leftbar-theme=dark][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item .side-nav-link:focus {
  color: var(--ct-dark-menu-item-hover);
}
body[data-leftbar-theme=dark][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover .side-nav-link {
  background: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  color: #fff !important;
  -webkit-transition: none;
  transition: none;
}
body[data-leftbar-theme=dark][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover > ul {
  background: var(--ct-bg-leftbar);
  -webkit-box-shadow: var(--ct-box-shadow);
          box-shadow: var(--ct-box-shadow);
}
body[data-leftbar-theme=dark][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover > ul a:hover {
  color: var(--ct-dark-menu-item-hover);
}
body[data-leftbar-theme=dark][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover > .collapse > ul,
body[data-leftbar-theme=dark][data-leftbar-compact-mode=condensed] .side-nav .side-nav-item:hover > .collapsing > ul {
  background: var(--ct-bg-leftbar);
}

body[data-layout=full][data-leftbar-theme=dark].hide-menu .wrapper .leftside-menu .logo {
  background: var(--ct-bg-leftbar) !important;
}

body[data-layout=full][data-leftbar-theme=light].hide-menu .wrapper .leftside-menu .logo {
  background: var(--ct-bg-leftbar) !important;
}

body[data-layout-color=dark][data-layout-mode=boxed] .wrapper {
  background-color: #000;
}
body[data-layout-color=dark][data-layout=detached] .leftbar-user .leftbar-user-name {
  color: #f1f1f1;
}


body[data-layout-color=dark] .navbar-custom .topbar-menu li .show.nav-link {
  color: #dee2e6;
}
body[data-layout-color=dark] .navbar-custom .topbar-menu .nav-link {
  color: #ced4da;
}
body[data-layout-color=dark] .notification-list .notify-item.unread-noti {
  background-color: #48515d;
}
body[data-layout-color=dark] .notification-list .notify-item.read-noti {
  border: 1px solid #464f5b;
}
body[data-layout-color=dark] .button-menu-mobile {
  color: #f1f1f1;
}
body[data-layout-color=dark] .nav-user {
  background-color: #464f5b;
  border: 1px solid #404954;
}
body[data-layout-color=dark] .topnav-navbar-dark .app-search span {
  color: #ced4da;
}

body[data-layout-color=dark] .footer {
  border-top: 1px solid rgba(206, 212, 218, 0.2);
  color: #ced4da;
}
body[data-layout-color=dark] .footer .footer-links a {
  color: #ced4da;
}
body[data-layout-color=dark] .footer .footer-links a:hover {
  color: #f1f1f1;
}
body[data-layout-color=dark][data-layout-mode=boxed] .footer {
  background-color: #000;
}

body[data-layout-color=dark] .custom-accordion .card-header {
  background-color: #404954;
}
body[data-layout-color=dark] .custom-accordion .card-body {
  border: 1px solid #404954;
}
body[data-layout-color=dark] .custom-accordion-title:hover {
  color: #99a4b2;
}


body[data-layout-color=dark] .btn-primary {
  -webkit-box-shadow: 0px 2px 6px 0px rgba(114, 124, 245, 0.5);
          box-shadow: 0px 2px 6px 0px rgba(114, 124, 245, 0.5);
}
body[data-layout-color=dark] .btn-secondary {
  -webkit-box-shadow: 0px 2px 6px 0px rgba(206, 212, 218, 0.5);
          box-shadow: 0px 2px 6px 0px rgba(206, 212, 218, 0.5);
}
body[data-layout-color=dark] .btn-success {
  -webkit-box-shadow: 0px 2px 6px 0px rgba(10, 207, 151, 0.5);
          box-shadow: 0px 2px 6px 0px rgba(10, 207, 151, 0.5);
}
body[data-layout-color=dark] .btn-info {
  -webkit-box-shadow: 0px 2px 6px 0px rgba(57, 175, 209, 0.5);
          box-shadow: 0px 2px 6px 0px rgba(57, 175, 209, 0.5);
}
body[data-layout-color=dark] .btn-warning {
  -webkit-box-shadow: 0px 2px 6px 0px rgba(255, 188, 0, 0.5);
          box-shadow: 0px 2px 6px 0px rgba(255, 188, 0, 0.5);
}
body[data-layout-color=dark] .btn-danger {
  -webkit-box-shadow: 0px 2px 6px 0px rgba(250, 92, 124, 0.5);
          box-shadow: 0px 2px 6px 0px rgba(250, 92, 124, 0.5);
}
body[data-layout-color=dark] .btn-light {
  -webkit-box-shadow: 0px 2px 6px 0px rgba(70, 79, 91, 0.5);
          box-shadow: 0px 2px 6px 0px rgba(70, 79, 91, 0.5);
}
body[data-layout-color=dark] .btn-dark {
  -webkit-box-shadow: 0px 2px 6px 0px rgba(241, 241, 241, 0.5);
          box-shadow: 0px 2px 6px 0px rgba(241, 241, 241, 0.5);
}
body[data-layout-color=dark] .btn-light {
  background-color: #464f5b;
  border-color: #464f5b;
  color: #f1f1f1;
}
body[data-layout-color=dark] .btn-dark {
  background-color: #f1f1f1;
  border-color: #f1f1f1;
  color: #404954;
}
body[data-layout-color=dark] .btn-secondary {
  background-color: #ced4da;
  border-color: #ced4da;
  color: #464f5b;
}
body[data-layout-color=dark] .btn-outline-light {
  border-color: #464f5b;
  color: #464f5b;
}
body[data-layout-color=dark] .btn-outline-light:hover, body[data-layout-color=dark] .btn-outline-light.active, body[data-layout-color=dark] .btn-outline-light:active, body[data-layout-color=dark] .btn-outline-light:focus {
  color: #f1f1f1 !important;
  background-color: #464f5b;
}
body[data-layout-color=dark] .btn-outline-dark {
  border-color: #f1f1f1;
  color: #f1f1f1;
}
body[data-layout-color=dark] .btn-outline-dark:hover, body[data-layout-color=dark] .btn-outline-dark.active, body[data-layout-color=dark] .btn-outline-dark:active, body[data-layout-color=dark] .btn-outline-dark:focus {
  color: #404954 !important;
  background-color: #f1f1f1;
}
body[data-layout-color=dark] .btn-outline-secondary {
  border-color: #ced4da;
  color: #ced4da;
}
body[data-layout-color=dark] .btn-outline-secondary:hover, body[data-layout-color=dark] .btn-outline-secondary.active, body[data-layout-color=dark] .btn-outline-secondary:active, body[data-layout-color=dark] .btn-outline-secondary:focus {
  color: #464f5b !important;
  background-color: #ced4da;
}


body[data-layout-color=dark] .badge-primary-lighten {
  color: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  background-color: rgba(114, 124, 245, 0.18);
}
body[data-layout-color=dark] .badge-primary-lighten[href] {
  color: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  text-decoration: none;
  background-color: rgba(114, 124, 245, 0.18);
}
body[data-layout-color=dark] .badge-primary-lighten[href]:hover, body[data-layout-color=dark] .badge-primary-lighten[href]:focus {
  color: <?php echo  $_COOKIE['cor_secundaria'] ?> !important;
  text-decoration: none;
  background-color: rgba(114, 124, 245, 0.4);
}
body[data-layout-color=dark] .badge-secondary-lighten {
  color: #ced4da;
  background-color: rgba(206, 212, 218, 0.18);
}
body[data-layout-color=dark] .badge-secondary-lighten[href] {
  color: #ced4da;
  text-decoration: none;
  background-color: rgba(206, 212, 218, 0.18);
}
body[data-layout-color=dark] .badge-secondary-lighten[href]:hover, body[data-layout-color=dark] .badge-secondary-lighten[href]:focus {
  color: #ced4da;
  text-decoration: none;
  background-color: rgba(206, 212, 218, 0.4);
}
body[data-layout-color=dark] .badge-success-lighten {
  color: #0acf97;
  background-color: rgba(10, 207, 151, 0.18);
}
body[data-layout-color=dark] .badge-success-lighten[href] {
  color: #0acf97;
  text-decoration: none;
  background-color: rgba(10, 207, 151, 0.18);
}
body[data-layout-color=dark] .badge-success-lighten[href]:hover, body[data-layout-color=dark] .badge-success-lighten[href]:focus {
  color: #0acf97;
  text-decoration: none;
  background-color: rgba(10, 207, 151, 0.4);
}
body[data-layout-color=dark] .badge-info-lighten {
  color: #39afd1;
  background-color: rgba(57, 175, 209, 0.18);
}
body[data-layout-color=dark] .badge-info-lighten[href] {
  color: #39afd1;
  text-decoration: none;
  background-color: rgba(57, 175, 209, 0.18);
}
body[data-layout-color=dark] .badge-info-lighten[href]:hover, body[data-layout-color=dark] .badge-info-lighten[href]:focus {
  color: #39afd1;
  text-decoration: none;
  background-color: rgba(57, 175, 209, 0.4);
}
body[data-layout-color=dark] .badge-warning-lighten {
  color: #ffbc00;
  background-color: rgba(255, 188, 0, 0.18);
}
body[data-layout-color=dark] .badge-warning-lighten[href] {
  color: #ffbc00;
  text-decoration: none;
  background-color: rgba(255, 188, 0, 0.18);
}
body[data-layout-color=dark] .badge-warning-lighten[href]:hover, body[data-layout-color=dark] .badge-warning-lighten[href]:focus {
  color: #ffbc00;
  text-decoration: none;
  background-color: rgba(255, 188, 0, 0.4);
}
body[data-layout-color=dark] .badge-danger-lighten {
  color: #fa5c7c;
  background-color: rgba(250, 92, 124, 0.18);
}
body[data-layout-color=dark] .badge-danger-lighten[href] {
  color: #fa5c7c;
  text-decoration: none;
  background-color: rgba(250, 92, 124, 0.18);
}
body[data-layout-color=dark] .badge-danger-lighten[href]:hover, body[data-layout-color=dark] .badge-danger-lighten[href]:focus {
  color: #fa5c7c;
  text-decoration: none;
  background-color: rgba(250, 92, 124, 0.4);
}
body[data-layout-color=dark] .badge-light-lighten {
  color: #464f5b;
  background-color: rgba(70, 79, 91, 0.18);
}
body[data-layout-color=dark] .badge-light-lighten[href] {
  color: #464f5b;
  text-decoration: none;
  background-color: rgba(70, 79, 91, 0.18);
}
body[data-layout-color=dark] .badge-light-lighten[href]:hover, body[data-layout-color=dark] .badge-light-lighten[href]:focus {
  color: #464f5b;
  text-decoration: none;
  background-color: rgba(70, 79, 91, 0.4);
}
body[data-layout-color=dark] .badge-dark-lighten {
  color: #f1f1f1;
  background-color: rgba(241, 241, 241, 0.18);
}
body[data-layout-color=dark] .badge-dark-lighten[href] {
  color: #f1f1f1;
  text-decoration: none;
  background-color: rgba(241, 241, 241, 0.18);
}
body[data-layout-color=dark] .badge-dark-lighten[href]:hover, body[data-layout-color=dark] .badge-dark-lighten[href]:focus {
  color: #f1f1f1;
  text-decoration: none;
  background-color: rgba(241, 241, 241, 0.4);
}
body[data-layout-color=dark] .badge-outline-primary {
  color: <?php echo  $_COOKIE['cor_principal'] ?> !important;
  border: 1px solid <?php echo  $_COOKIE['cor_principal'] ?> !important;
  background-color: transparent;
}
body[data-layout-color=dark] .badge-outline-primary[href] {
  color: <?php echo  $_COOKIE['cor_principal'] ?> !important;
  text-decoration: none;
  background-color: rgba(114, 124, 245, 0.2);
}
body[data-layout-color=dark] .badge-outline-primary[href]:hover, body[data-layout-color=dark] .badge-outline-primary[href]:focus {
  color: <?php echo  $_COOKIE['cor_principal'] ?> !important;
  text-decoration: none;
  background-color: rgba(114, 124, 245, 0.2);
}
body[data-layout-color=dark] .badge-outline-secondary {
  color: #ced4da;
  border: 1px solid #ced4da;
  background-color: transparent;
}
body[data-layout-color=dark] .badge-outline-secondary[href] {
  color: #ced4da;
  text-decoration: none;
  background-color: rgba(206, 212, 218, 0.2);
}
body[data-layout-color=dark] .badge-outline-secondary[href]:hover, body[data-layout-color=dark] .badge-outline-secondary[href]:focus {
  color: #ced4da;
  text-decoration: none;
  background-color: rgba(206, 212, 218, 0.2);
}
body[data-layout-color=dark] .badge-outline-success {
  color: #0acf97;
  border: 1px solid #0acf97;
  background-color: transparent;
}
body[data-layout-color=dark] .badge-outline-success[href] {
  color: #0acf97;
  text-decoration: none;
  background-color: rgba(10, 207, 151, 0.2);
}
body[data-layout-color=dark] .badge-outline-success[href]:hover, body[data-layout-color=dark] .badge-outline-success[href]:focus {
  color: #0acf97;
  text-decoration: none;
  background-color: rgba(10, 207, 151, 0.2);
}
body[data-layout-color=dark] .badge-outline-info {
  color: #39afd1;
  border: 1px solid #39afd1;
  background-color: transparent;
}
body[data-layout-color=dark] .badge-outline-info[href] {
  color: #39afd1;
  text-decoration: none;
  background-color: rgba(57, 175, 209, 0.2);
}
body[data-layout-color=dark] .badge-outline-info[href]:hover, body[data-layout-color=dark] .badge-outline-info[href]:focus {
  color: #39afd1;
  text-decoration: none;
  background-color: rgba(57, 175, 209, 0.2);
}
body[data-layout-color=dark] .badge-outline-warning {
  color: #ffbc00;
  border: 1px solid #ffbc00;
  background-color: transparent;
}
body[data-layout-color=dark] .badge-outline-warning[href] {
  color: #ffbc00;
  text-decoration: none;
  background-color: rgba(255, 188, 0, 0.2);
}
body[data-layout-color=dark] .badge-outline-warning[href]:hover, body[data-layout-color=dark] .badge-outline-warning[href]:focus {
  color: #ffbc00;
  text-decoration: none;
  background-color: rgba(255, 188, 0, 0.2);
}
body[data-layout-color=dark] .badge-outline-danger {
  color: #fa5c7c;
  border: 1px solid #fa5c7c;
  background-color: transparent;
}
body[data-layout-color=dark] .badge-outline-danger[href] {
  color: #fa5c7c;
  text-decoration: none;
  background-color: rgba(250, 92, 124, 0.2);
}
body[data-layout-color=dark] .badge-outline-danger[href]:hover, body[data-layout-color=dark] .badge-outline-danger[href]:focus {
  color: #fa5c7c;
  text-decoration: none;
  background-color: rgba(250, 92, 124, 0.2);
}
body[data-layout-color=dark] .badge-outline-light {
  color: #464f5b;
  border: 1px solid #464f5b;
  background-color: transparent;
}
body[data-layout-color=dark] .badge-outline-light[href] {
  color: #464f5b;
  text-decoration: none;
  background-color: rgba(70, 79, 91, 0.2);
}
body[data-layout-color=dark] .badge-outline-light[href]:hover, body[data-layout-color=dark] .badge-outline-light[href]:focus {
  color: #464f5b;
  text-decoration: none;
  background-color: rgba(70, 79, 91, 0.2);
}
body[data-layout-color=dark] .badge-outline-dark {
  color: #f1f1f1;
  border: 1px solid #f1f1f1;
  background-color: transparent;
}
body[data-layout-color=dark] .badge-outline-dark[href] {
  color: #f1f1f1;
  text-decoration: none;
  background-color: rgba(241, 241, 241, 0.2);
}
body[data-layout-color=dark] .badge-outline-dark[href]:hover, body[data-layout-color=dark] .badge-outline-dark[href]:focus {
  color: #f1f1f1;
  text-decoration: none;
  background-color: rgba(241, 241, 241, 0.2);
}

body[data-layout-color=dark] .card-pricing .card-pricing-price span, body[data-layout-color=dark] .card-pricing .card-pricing-features {
  color: #ced4da;
}
body[data-layout-color=dark] .card-disabled {
  background: rgba(64, 73, 84, 0.8);
}
body[data-layout-color=dark] .card-disabled .card-portlets-loader {
  background-color: #f1f1f1;
}


body[data-layout-color=dark] .hljs {
  border: 1px solid rgba(206, 212, 218, 0.2);
}
body[data-layout-color=dark] .hljs,
body[data-layout-color=dark] .hljs-keyword,
body[data-layout-color=dark] .hljs-selector-tag,
body[data-layout-color=dark] .hljs-subst {
  color: #f1f1f1;
}
body[data-layout-color=dark] .hljs-meta {
  color: #e3eaef;
}
body[data-layout-color=dark] .hljs-comment {
  color: #8391a2;
}

body[data-layout-color=dark] .form-control-light {
  background-color: #404954 !important;
  border-color: #404954 !important;
}

body[data-layout-color=dark] .nav-tabs > li > a, body[data-layout-color=dark] .nav-pills > li > a {
  color: #dee2e6;
}
body[data-layout-color=dark] .nav-pills > a {
  color: #dee2e6;
}
body[data-layout-color=dark] .nav-tabs.nav-bordered {
  border-bottom: 2px solid rgba(206, 212, 218, 0.2);
}


body[data-layout-color=dark] .ribbon-primary {
  background: <?php echo  $_COOKIE['cor_principal'] ?> !important;
}
body[data-layout-color=dark] .ribbon-primary:before {
  border-color: #5a66f3 transparent transparent;
}
body[data-layout-color=dark] .ribbon-secondary {
  background: #ced4da;
}
body[data-layout-color=dark] .ribbon-secondary:before {
  border-color: #bfc7cf transparent transparent;
}
body[data-layout-color=dark] .ribbon-success {
  background: #0acf97;
}
body[data-layout-color=dark] .ribbon-success:before {
  border-color: #09b785 transparent transparent;
}
body[data-layout-color=dark] .ribbon-info {
  background: #39afd1;
}
body[data-layout-color=dark] .ribbon-info:before {
  border-color: #2da2c3 transparent transparent;
}
body[data-layout-color=dark] .ribbon-warning {
  background: #ffbc00;
}
body[data-layout-color=dark] .ribbon-warning:before {
  border-color: #e6a900 transparent transparent;
}
body[data-layout-color=dark] .ribbon-danger {
  background: #fa5c7c;
}
body[data-layout-color=dark] .ribbon-danger:before {
  border-color: #f94368 transparent transparent;
}
body[data-layout-color=dark] .ribbon-light {
  background: #464f5b;
}
body[data-layout-color=dark] .ribbon-light:before {
  border-color: #3b424d transparent transparent;
}
body[data-layout-color=dark] .ribbon-dark {
  background: #f1f1f1;
}
body[data-layout-color=dark] .ribbon-dark:before {
  border-color: #e4e4e4 transparent transparent;
}
body[data-layout-color=dark] .ribbon-two-primary span {
  background: <?php echo  $_COOKIE['cor_principal'] ?> !important;
}
body[data-layout-color=dark] .ribbon-two-primary span:before {
  border-left: 3px solid #5a66f3;
  border-top: 3px solid #5a66f3;
}
body[data-layout-color=dark] .ribbon-two-primary span:after {
  border-right: 3px solid #5a66f3;
  border-top: 3px solid #5a66f3;
}
body[data-layout-color=dark] .ribbon-two-secondary span {
  background: #ced4da;
}
body[data-layout-color=dark] .ribbon-two-secondary span:before {
  border-left: 3px solid #bfc7cf;
  border-top: 3px solid #bfc7cf;
}
body[data-layout-color=dark] .ribbon-two-secondary span:after {
  border-right: 3px solid #bfc7cf;
  border-top: 3px solid #bfc7cf;
}
body[data-layout-color=dark] .ribbon-two-success span {
  background: #0acf97;
}
body[data-layout-color=dark] .ribbon-two-success span:before {
  border-left: 3px solid #09b785;
  border-top: 3px solid #09b785;
}
body[data-layout-color=dark] .ribbon-two-success span:after {
  border-right: 3px solid #09b785;
  border-top: 3px solid #09b785;
}
body[data-layout-color=dark] .ribbon-two-info span {
  background: #39afd1;
}
body[data-layout-color=dark] .ribbon-two-info span:before {
  border-left: 3px solid #2da2c3;
  border-top: 3px solid #2da2c3;
}
body[data-layout-color=dark] .ribbon-two-info span:after {
  border-right: 3px solid #2da2c3;
  border-top: 3px solid #2da2c3;
}
body[data-layout-color=dark] .ribbon-two-warning span {
  background: #ffbc00;
}
body[data-layout-color=dark] .ribbon-two-warning span:before {
  border-left: 3px solid #e6a900;
  border-top: 3px solid #e6a900;
}
body[data-layout-color=dark] .ribbon-two-warning span:after {
  border-right: 3px solid #e6a900;
  border-top: 3px solid #e6a900;
}
body[data-layout-color=dark] .ribbon-two-danger span {
  background: #fa5c7c;
}
body[data-layout-color=dark] .ribbon-two-danger span:before {
  border-left: 3px solid #f94368;
  border-top: 3px solid #f94368;
}
body[data-layout-color=dark] .ribbon-two-danger span:after {
  border-right: 3px solid #f94368;
  border-top: 3px solid #f94368;
}
body[data-layout-color=dark] .ribbon-two-light span {
  background: #464f5b;
}
body[data-layout-color=dark] .ribbon-two-light span:before {
  border-left: 3px solid #3b424d;
  border-top: 3px solid #3b424d;
}
body[data-layout-color=dark] .ribbon-two-light span:after {
  border-right: 3px solid #3b424d;
  border-top: 3px solid #3b424d;
}
body[data-layout-color=dark] .ribbon-two-dark span {
  background: #f1f1f1;
}
body[data-layout-color=dark] .ribbon-two-dark span:before {
  border-left: 3px solid #e4e4e4;
  border-top: 3px solid #e4e4e4;
}
body[data-layout-color=dark] .ribbon-two-dark span:after {
  border-right: 3px solid #e4e4e4;
  border-top: 3px solid #e4e4e4;
}


body[data-layout-color=dark] input[data-switch][data-switch=none] + label {
  background-color: #404954;
}
body[data-layout-color=dark] input[data-switch] + label:before {
  color: #f1f1f1;
}
body[data-layout-color=dark] input[data-switch] + label:after {
  background-color: #aab8c5;
}
body[data-layout-color=dark] input[data-switch]:checked + label:after {
  background-color: #404954;
}
body[data-layout-color=dark] input[data-switch=bool] + label:after {
  background-color: #404954;
}
body[data-layout-color=dark] input[data-switch=primary]:checked + label {
  background-color: <?php echo  $_COOKIE['cor_principal'] ?> !important;
}
body[data-layout-color=dark] input[data-switch=secondary]:checked + label {
  background-color: #ced4da;
}
body[data-layout-color=dark] input[data-switch=success]:checked + label {
  background-color: #0acf97;
}
body[data-layout-color=dark] input[data-switch=info]:checked + label {
  background-color: #39afd1;
}
body[data-layout-color=dark] input[data-switch=warning]:checked + label {
  background-color: #ffbc00;
}
body[data-layout-color=dark] input[data-switch=danger]:checked + label {
  background-color: #fa5c7c;
}
body[data-layout-color=dark] input[data-switch=light]:checked + label {
  background-color: #464f5b;
}
body[data-layout-color=dark] input[data-switch=dark]:checked + label {
  background-color: #f1f1f1;
}

body[data-layout-color=dark] table .action-icon {
  color: #ced4da;
}
body[data-layout-color=dark] table .action-icon:hover {
  color: #dee2e6;
}
body[data-layout-color=dark] table .table-light {
  --ct-table-bg: #464f5b;
  color: #fff;
  border-color: var(--ct-table-group-separator-color);
}
body[data-layout-color=dark] table .table-dark {
  --ct-table-bg: #424e5a;
}
body[data-layout-color=dark] table.table-hover thead tr:hover > *,
body[data-layout-color=dark] table.table-hover tbody tr:hover > * {
  --ct-table-accent-bg: rgba(64, 73, 84, 0.8);
}
body[data-layout-color=dark] table tr.table-active {
  --ct-table-accent-bg: rgba(64, 73, 84, 0.8);
}
body[data-layout-color=dark] table.table-striped tbody tr:nth-of-type(odd) > * {
  --ct-table-accent-bg: rgba(64, 73, 84, 0.8);
}


body[data-layout-color=dark] .bg-primary {
  background-color:<?php echo  $_COOKIE['cor_principal'] ?> !important;
}
body[data-layout-color=dark] .bg-primary-lighten {
  background-color: rgba(114, 124, 245, 0.25) !important;
}
body[data-layout-color=dark] .bg-secondary {
  background-color: #ced4da !important;
}
body[data-layout-color=dark] .bg-secondary-lighten {
  background-color: rgba(206, 212, 218, 0.25) !important;
}
body[data-layout-color=dark] .bg-success {
  background-color: #0acf97 !important;
}
body[data-layout-color=dark] .bg-success-lighten {
  background-color: rgba(10, 207, 151, 0.25) !important;
}
body[data-layout-color=dark] .bg-info {
  background-color: #39afd1 !important;
}
body[data-layout-color=dark] .bg-info-lighten {
  background-color: rgba(57, 175, 209, 0.25) !important;
}
body[data-layout-color=dark] .bg-warning {
  background-color: #ffbc00 !important;
}
body[data-layout-color=dark] .bg-warning-lighten {
  background-color: rgba(255, 188, 0, 0.25) !important;
}
body[data-layout-color=dark] .bg-danger {
  background-color: #fa5c7c !important;
}
body[data-layout-color=dark] .bg-danger-lighten {
  background-color: rgba(250, 92, 124, 0.25) !important;
}
body[data-layout-color=dark] .bg-light {
  background-color: #464f5b !important;
}
body[data-layout-color=dark] .bg-light-lighten {
  background-color: rgba(70, 79, 91, 0.25) !important;
}
body[data-layout-color=dark] .bg-dark {
  background-color: #f1f1f1 !important;
}
body[data-layout-color=dark] .bg-dark-lighten {
  background-color: rgba(241, 241, 241, 0.25) !important;
}


body[data-layout-color=dark] .text-primary {
  color: <?php echo  $_COOKIE['cor_principal'] ?> !important;
}
body[data-layout-color=dark] .text-secondary {
  color: #ced4da !important;
}
body[data-layout-color=dark] .text-success {
  color: #0acf97 !important;
}
body[data-layout-color=dark] .text-info {
  color: #39afd1 !important;
}
body[data-layout-color=dark] .text-warning {
  color: #ffbc00 !important;
}
body[data-layout-color=dark] .text-danger {
  color: #fa5c7c !important;
}
body[data-layout-color=dark] .text-light {
  color: #464f5b !important;
}
body[data-layout-color=dark] .text-dark {
  color: #f1f1f1 !important;
}
body[data-layout-color=dark] .text-body {
  color: #aab8c5 !important;
}


body[data-layout-color=dark] .border-primary {
  border-color: <?php echo  $_COOKIE['cor_principal'] ?> !important; 
}
body[data-layout-color=dark] .border-secondary {
  border-color: #ced4da !important;
}
body[data-layout-color=dark] .border-success {
  border-color: #0acf97 !important;
}
body[data-layout-color=dark] .border-info {
  border-color: #39afd1 !important;
}
body[data-layout-color=dark] .border-warning {
  border-color: #ffbc00 !important;
}
body[data-layout-color=dark] .border-danger {
  border-color: #fa5c7c !important;
}
body[data-layout-color=dark] .border-light {
  border-color: #464f5b !important;
}
body[data-layout-color=dark] .border-dark {
  border-color: #f1f1f1 !important;
}

body[data-layout-color=dark] .chart-content-bg {
  background-color: #444e5a;
}
body[data-layout-color=dark] .chart-content-border {
  border: 1px solid #37404a;
}
body[data-layout-color=dark] .chart-widget-list p {
  border-bottom: 1px solid #404954;
}
body[data-layout-color=dark] .timeline-alt .timeline-item:before {
  background-color: #404954;
}
body[data-layout-color=dark] .inbox-widget .inbox-item {
  border-bottom: 1px solid #4b5662;
}
body[data-layout-color=dark] .inbox-widget .inbox-item .inbox-item-author {
  color: #e3eaef;
}
body[data-layout-color=dark] .inbox-widget .inbox-item .inbox-item-text {
  color: #aab8c5;
}
body[data-layout-color=dark] .inbox-widget .inbox-item .inbox-item-date {
  color: #ced4da;
}
body[data-layout-color=dark] .multi-user a {
  border: 3px solid #404954;
}


body[data-layout-color=dark] .social-list-item {
  border: 2px solid #aab8c5;
}
body[data-layout-color=dark] .social-list-item:hover {
  color: #ced4da;
  border-color: #ced4da;
}

body[data-layout-color=dark] .horizontal-steps:before {
  background-color: #37404a;
}
body[data-layout-color=dark] .horizontal-steps .horizontal-steps-content .step-item {
  border: 0.25em solid <?php echo  $_COOKIE['cor_principal'] ?> !important;
}
body[data-layout-color=dark] .horizontal-steps .horizontal-steps-content .step-item span {
  color: #aab8c5;
}

body[data-layout-color=dark] #preloader {
  background-color: #404954;
}


body[data-layout-color=dark] .auth-brand .logo-dark {
  display: none;
}
body[data-layout-color=dark] .auth-brand .logo-light {
  display: block;
}

body[data-layout-color=dark] .grid-structure .grid-container {
  background-color: #404954;
}

body[data-layout-color=dark] .faq-question {
  color: #f1f1f1;
}

body[data-layout-color=dark] .tasks {
  border: 1px solid #37404a;
}
body[data-layout-color=dark] .tasks .task-header {
  background-color: #404954;
}
body[data-layout-color=dark] .task-modal-content .form-control-light {
  background-color: #3c4651 !important;
  border-color: #3c4651 !important;
}

body[data-layout-color=dark] .page-aside-left::before {
  background-color: #000;
}
body[data-layout-color=dark] .page-aside-right {
  border-left: 5px solid #000;
}
body[data-layout-color=dark] .email-list > li a {
  color: #dee2e6;
}
body[data-layout-color=dark] .email-list > li a:hover {
  color: #e3eaef;
}
body[data-layout-color=dark] .email-list > li .email-sender-info .star-toggle {
  color: #aab8c5;
}
body[data-layout-color=dark] .email-list > li.active, body[data-layout-color=dark] .email-list > li.mail-selected {
  background: #404954;
}
body[data-layout-color=dark] .email-list > li:hover {
  background: #404954;
}
body[data-layout-color=dark] .email-menu-list a {
  color: #dee2e6;
}
body[data-layout-color=dark] .email-menu-list a:hover {
  color: #e3eaef;
}

body[data-layout-color=dark] .timeline:before {
  background-color: #464f5b;
}
body[data-layout-color=dark] .timeline-show .time-show-name {
  background-color: #37404a;
}
@media (min-width: 768px) {
  body[data-layout-color=dark] .timeline .timeline-icon {
    background: #464f5b;
  }
  body[data-layout-color=dark] .timeline .timeline-icon i {
    color: #ced4da;
  }
}


body[data-layout-color=dark] .apex-charts text {
  fill: #aab8c5;
}
body[data-layout-color=dark] .apex-charts text tspan {
  fill: #aab8c5;
}
body[data-layout-color=dark] .apex-charts text.apexcharts-title-text {
  fill: #aab8c5 !important;
}
body[data-layout-color=dark] .apexcharts-tooltip-title,
body[data-layout-color=dark] .apexcharts-tooltip-text {
  font-family: "Nunito", sans-serif !important;
  color: #8391a2;
}
body[data-layout-color=dark] .apexcharts-legend-text {
  color: #ced4da !important;
}
body[data-layout-color=dark] .apexcharts-yaxis text,
body[data-layout-color=dark] .apexcharts-xaxis text {
  fill: #aab8c5;
}
body[data-layout-color=dark] .apexcharts-radar-series polygon {
  stroke: #464f5b;
}
body[data-layout-color=dark] .apexcharts-radar-series line {
  stroke: #464f5b;
}
body[data-layout-color=dark] .apexcharts-xaxis .apexcharts-datalabel,
body[data-layout-color=dark] .apexcharts-yaxis text {
  fill: #ced4da !important;
}
body[data-layout-color=dark] .apexcharts-datalabels-group text {
  fill: #aab8c5 !important;
}
body[data-layout-color=dark] .apexcharts-track path {
  stroke: #515c69;
}


body[data-layout-color=dark] .horizontal-grid-line,
body[data-layout-color=dark] .vertical-grid-line,
body[data-layout-color=dark] .extended-x-line,
body[data-layout-color=dark] .extended-y-line {
  stroke: #464f5b;
}
body[data-layout-color=dark] .tick text,
body[data-layout-color=dark] .bar-chart .percentage-label,
body[data-layout-color=dark] .donut-text,
body[data-layout-color=dark] .legend-entry-name,
body[data-layout-color=dark] .legend-entry-value {
  fill: #ced4da;
}


body[data-layout-color=dark] .fc th.fc-widget-header {
  background: #464f5b;
}
body[data-layout-color=dark] .fc-unthemed th,
body[data-layout-color=dark] .fc-unthemed td,
body[data-layout-color=dark] .fc-unthemed thead,
body[data-layout-color=dark] .fc-unthemed tbody,
body[data-layout-color=dark] .fc-unthemed .fc-divider,
body[data-layout-color=dark] .fc-unthemed .fc-row,
body[data-layout-color=dark] .fc-unthemed .fc-popover {
  border-color: #464f5b;
}
body[data-layout-color=dark] .fc-unthemed td.fc-today,
body[data-layout-color=dark] .fc-unthemed .fc-divider {
  background: #464f5b;
}
body[data-layout-color=dark] .fc-button {
  background: #464f5b;
  border: none;
  color: #dee2e6;
}
body[data-layout-color=dark] .fc-state-hover,
body[data-layout-color=dark] .fc-state-highlight,
body[data-layout-color=dark] .fc-cell-overlay {
  background: #464f5b;
}
body[data-layout-color=dark] .fc-event.bg-dark .fc-event-time, body[data-layout-color=dark] .fc-event.bg-dark .fc-event-title {
  color: #404954;
}
body[data-layout-color=dark] .fc-event.bg-dark .fc-daygrid-event-dot {
  border-color: #404954;
}
body[data-layout-color=dark] .fc-daygrid-day-number {
  background-color: #404954;
}

body[data-layout-color=dark] table.dataTable th {
  border-bottom-color: #59616b;
}
body[data-layout-color=dark] .activate-select .sorting_1 {
  background-color: #404954;
}


body[data-layout-color=dark] .daterangepicker .calendar-table td, body[data-layout-color=dark] .daterangepicker .calendar-table th {
  color: #ced4da;
}
body[data-layout-color=dark] .daterangepicker .calendar-table .next span,
body[data-layout-color=dark] .daterangepicker .calendar-table .prev span {
  border-color: #aab8c5;
}
body[data-layout-color=dark] .daterangepicker td.in-range {
  background-color: #515c69;
  color: #dee2e6;
}
body[data-layout-color=dark] .daterangepicker select.ampmselect, body[data-layout-color=dark] .daterangepicker select.hourselect, body[data-layout-color=dark] .daterangepicker select.minuteselect, body[data-layout-color=dark] .daterangepicker select.secondselect {
  background: #404954;
  border: 1px solid #404954;
}

body[data-layout-color=dark] .datepicker table tr td.day.focused, body[data-layout-color=dark] .datepicker table tr td.day:hover,
body[data-layout-color=dark] .datepicker table tr td span.focused,
body[data-layout-color=dark] .datepicker table tr td span:hover {
  background: #37404a;
}
body[data-layout-color=dark] .datepicker table tr td.new, body[data-layout-color=dark] .datepicker table tr td.old,
body[data-layout-color=dark] .datepicker table tr td span.new,
body[data-layout-color=dark] .datepicker table tr td span.old {
  color: #dee2e6;
}
body[data-layout-color=dark] .datepicker .datepicker-switch:hover,
body[data-layout-color=dark] .datepicker .next:hover,
body[data-layout-color=dark] .datepicker .prev:hover,
body[data-layout-color=dark] .datepicker tfoot tr th:hover {
  background: #37404a;
}


body[data-layout-color=dark] .gmaps,
body[data-layout-color=dark] .gmaps-panaroma {
  background: #404954;
}
body[data-layout-color=dark] .jvectormap-label {
  border: none;
  background: #e3eaef;
  color: #404954;
}
body[data-layout-color=dark] .jvectormap-container .jvectormap-zoomin, body[data-layout-color=dark] .jvectormap-container .jvectormap-zoomout {
  background-color: #e3eaef;
  color: #404954;
}

body[data-layout-color=dark] .select2-container .select2-selection--single .select2-selection__arrow b {
  border-color: #8391a2 transparent transparent transparent;
}
body[data-layout-color=dark] .select2-container--open .select2-selection--single .select2-selection__arrow b {
  border-color: transparent transparent #8391a2 transparent !important;
}
body[data-layout-color=dark] .select2-container--default .select2-results__option--selected {
  background-color: #464f5b;
}

body[data-layout-color=dark] .close-jq-toast-single {
  background: #e3eaef;
  color: #404954;
}

body[data-layout-color=dark] .bootstrap-timepicker-widget table td a {
  color: #dee2e6;
}


body[data-layout-color=dark] .editor-preview,
body[data-layout-color=dark] .editor-preview-side {
  background: #464f5b;
}
body[data-layout-color=dark] .editor-preview-active {
  background: #4c5562;
}
body[data-layout-color=dark] .editor-toolbar a {
  color: #dee2e6 !important;
}
body[data-layout-color=dark] .CodeMirror-cursor {
  border-left: 1px solid #e3eaef;
}
body[data-layout-color=dark] .editor-statusbar {
  color: #e3eaef;
}


body[data-layout-color=dark] .rateit.rateit-font .rateit-reset {
  background: #464f5b;
}
body[data-layout-color=dark] .rateit.rateit-font .rateit-reset span {
  border-bottom: 2px solid #dee2e6;
}
body[data-layout-color=dark] .rateit-font .rateit-empty {
  color: #8391a2;
}


body[data-layout-color=dark] .irs--flat .irs-min,
body[data-layout-color=dark] .irs--flat .irs-max {
  color: #dee2e6;
}
body[data-layout-color=dark] .irs-grid-text {
  color: #dee2e6;
}


body[data-layout-color=dark] .jstree-default .jstree-clicked, body[data-layout-color=dark] .jstree-default .jstree-hovered {
  background: #464f5b;
}
body[data-layout-color=dark] .jstree-wholerow.jstree-wholerow-clicked, body[data-layout-color=dark] .jstree-wholerow.jstree-wholerow-hovered {
  background: #464f5b;
}

body[data-layout-color=dark] .gantt .bar-label, body[data-layout-color=dark] .gantt .bar-label.big {
  fill: #dee2e6;
}
body[data-layout-color=dark] .gantt .today-highlight {
  fill: #464f5b;
}

body[data-layout-mode=boxed] {
  background-color: var(--ct-boxed-layout-bg);
}
body[data-layout-mode=boxed] .wrapper {
  max-width: 1300px;
  margin: 0 auto;
  background-color: #fafbfe;
  -webkit-box-shadow: var(--ct-box-shadow);
          box-shadow: var(--ct-box-shadow);
}
body[data-layout-mode=boxed][data-leftbar-compact-mode=condensed] .logo {
  position: relative;
  margin-top: -70px;
}

body[data-layout=detached][data-layout-mode=boxed] .wrapper {
  max-width: 100%;
}

@media (min-width: 992px) {
  body[data-leftbar-compact-mode=scrollable]:not([data-layout-mode=boxed]):not([data-layout=topnav]) .navbar-custom {
    position: absolute;
  }
}

body[data-layout-mode=boxed] .navbar-custom {
  position: relative;
  left: 0 !important;
  margin: -70px -12px 0;
}
body[data-layout-mode=boxed][data-layout=topnav] .navbar-custom {
  margin: 0;
}

body[data-layout=topnav][data-layout-mode=boxed] .footer {
  max-width: 1300px;
}

body[data-layout-mode=boxed] .footer {
  border: none;
  margin: 0 auto;
  background-color: #fafbfe;
  -webkit-box-shadow: var(--ct-box-shadow);
          box-shadow: var(--ct-box-shadow);
  max-width: calc(1300px - 260px);
}
body[data-layout-mode=boxed][data-leftbar-compact-mode=condensed] .footer {
  max-width: calc(1300px - 70px);
}

 body[data-layout=topnav][data-layout-mode=boxed] .container-fluid, body[data-layout=topnav][data-layout-mode=boxed] .container-sm, body[data-layout=topnav][data-layout-mode=boxed] .container-md, body[data-layout=topnav][data-layout-mode=boxed] .container-lg, body[data-layout=topnav][data-layout-mode=boxed] .container-xl, body[data-layout=topnav][data-layout-mode=boxed] .container-xxl {
    max-width: 97%;
  }