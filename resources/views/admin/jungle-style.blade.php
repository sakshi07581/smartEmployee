<style>
    /* ============================================================
   JUNGLE ROSHAN UI — V3
   "Jungle After Dusk"
   ------------------------------------------------------------
   Atmosphere:
   Dense rainforest • evening • wet leaves • bark • moss
   insects • vines • amber fireflies • subtle uneasiness
   ------------------------------------------------------------
   Designed as a CSS-only override for:
   Bootstrap 5 + AdminLTE
   ============================================================ */


/* ============================================================
   01. DESIGN TOKENS
   ============================================================ */

:root {

    /* =========================
       NIGHT
       ========================= */

    --j-night-0: #07100d;
    --j-night-1: #0b1712;
    --j-night-2: #0f1e17;
    --j-night-3: #14271e;


    /* =========================
       JUNGLE
       ========================= */

    --j-green-0: #16291f;
    --j-green-1: #1d3426;
    --j-green-2: #284631;
    --j-green-3: #35583b;
    --j-green-4: #476b48;


    /* =========================
       MOSS
       ========================= */

    --j-moss: #647044;
    --j-moss-light: #84905b;
    --j-moss-dark: #465131;


    /* =========================
       BARK
       ========================= */

    --j-bark-0: #15100c;
    --j-bark-1: #211811;
    --j-bark-2: #302117;
    --j-bark-3: #493424;
    --j-bark-4: #624832;


    /* =========================
       EARTH
       ========================= */

    --j-earth: #5d4c34;
    --j-earth-light: #806947;
    --j-earth-dark: #382d20;


    /* =========================
       AMBER / FIREFLY
       ========================= */

    --j-amber: #b8893f;
    --j-amber-light: #d4aa5a;
    --j-amber-bright: #e6c474;
    --j-amber-dark: #775625;


    /* =========================
       DANGER
       ========================= */

    --j-red: #873c32;
    --j-red-dark: #5f2823;
    --j-red-light: #a95345;


    /* =========================
       TEXT
       ========================= */

    --j-text: #d8ddc8;
    --j-text-soft: #aeb8a1;
    --j-text-muted: #788574;
    --j-text-dark: #3b463a;

    --j-white: #e9edda;


    /* =========================
       BORDERS
       ========================= */

    --j-border:
        rgba(119, 145, 103, .18);

    --j-border-light:
        rgba(170, 190, 145, .12);

    --j-border-dark:
        rgba(0, 0, 0, .55);


    /* =========================
       SHADOWS
       ========================= */

    --j-shadow:
        0 5px 16px rgba(0, 0, 0, .30);

    --j-shadow-deep:
        0 10px 28px rgba(0, 0, 0, .42);

    --j-inset:
        inset 0 1px 0 rgba(180, 200, 165, .07),
        inset 0 -1px 0 rgba(0, 0, 0, .30);


    /* =========================
       RADIUS
       ========================= */

    --j-radius: 4px;
    --j-radius-small: 3px;


    /* =========================
       MOTION
       ========================= */

    --j-transition:
        150ms ease;
}


/* ============================================================
   02. GLOBAL ENVIRONMENT
   ============================================================ */

html,
body {

    color:
        var(--j-text);

    background:
        var(--j-night-0);
}


/*
   Main jungle environment.

   Multiple subtle layers:
   - deep darkness
   - foliage
   - damp areas
   - distant light
*/

body {

    background-color:
        var(--j-night-0);

    background-image:

        /* distant moon / evening light */
        radial-gradient(
            ellipse at 72% 8%,
            rgba(100, 126, 91, .12),
            transparent 28%
        ),

        /* dense foliage */
        radial-gradient(
            ellipse at 8% 35%,
            rgba(43, 79, 50, .16),
            transparent 30%
        ),

        radial-gradient(
            ellipse at 92% 65%,
            rgba(34, 67, 43, .13),
            transparent 32%
        ),

        /* humid dark patches */
        radial-gradient(
            ellipse at 50% 100%,
            rgba(20, 44, 30, .35),
            transparent 55%
        ),

        /* extremely subtle organic texture */
        repeating-linear-gradient(
            92deg,
            rgba(120, 145, 105, .018) 0,
            rgba(120, 145, 105, .018) 1px,
            transparent 1px,
            transparent 9px
        );

    background-attachment:
        fixed;
}


/* ============================================================
   03. MAIN CONTENT
   ============================================================ */

.content-wrapper {

    background:
        transparent !important;
}


.content {

    background:
        transparent;
}


/* ============================================================
   04. TYPOGRAPHY
   ============================================================ */

body,
p,
span,
div,
label,
small {

    color:
        var(--j-text);
}


h1,
h2,
h3,
h4,
h5,
h6 {

    color:
        var(--j-white);

    font-weight:
        700;
}


.text-muted {

    color:
        var(--j-text-muted) !important;
}


.text-dark {

    color:
        var(--j-text) !important;
}


a {

    color:
        var(--j-amber-light);

    text-decoration:
        none;

    transition:
        color var(--j-transition);
}


a:hover {

    color:
        var(--j-amber-bright);

    text-decoration:
        none;
}


/* ============================================================
   05. MAIN HEADER
   ============================================================ */

.main-header {

    background-color:
        rgba(14, 25, 19, .96) !important;

    background-image:

        repeating-linear-gradient(
            90deg,
            rgba(90, 115, 75, .025) 0,
            rgba(90, 115, 75, .025) 1px,
            transparent 1px,
            transparent 8px
        ) !important;

    border-bottom:
        1px solid var(--j-border-dark) !important;

    box-shadow:
        0 3px 12px rgba(0,0,0,.32) !important;
}


.main-header .nav-link {

    color:
        var(--j-text-soft) !important;

    transition:
        background var(--j-transition),
        color var(--j-transition);
}


.main-header .nav-link:hover {

    color:
        var(--j-white) !important;

    background:
        rgba(82, 108, 73, .10);
}


/* ============================================================
   06. NAVBAR SEARCH
   ============================================================ */

.form-control-navbar {

    color:
        var(--j-text) !important;

    background:
        rgba(9, 18, 13, .75) !important;

    border:
        1px solid var(--j-border) !important;

    box-shadow:
        inset 0 1px 4px rgba(0,0,0,.35);
}


.form-control-navbar::placeholder {

    color:
        var(--j-text-muted);
}


/* ============================================================
   07. SIDEBAR — TREE BARK
   ============================================================ */

.main-sidebar {

    background-color:
        var(--j-bark-0) !important;

    background-image:

        /* bark grain */
        repeating-linear-gradient(
            88deg,
            rgba(125, 91, 58, .055) 0,
            rgba(125, 91, 58, .055) 2px,
            transparent 2px,
            transparent 9px
        ),

        repeating-linear-gradient(
            2deg,
            rgba(0,0,0,.08) 0,
            rgba(0,0,0,.08) 1px,
            transparent 1px,
            transparent 13px
        ),

        /* green growth */
        radial-gradient(
            ellipse at 15% 30%,
            rgba(53, 87, 51, .13),
            transparent 30%
        ),

        radial-gradient(
            ellipse at 90% 80%,
            rgba(55, 82, 46, .09),
            transparent 28%
        ) !important;

    border-right:
        1px solid rgba(0,0,0,.7);

    box-shadow:
        5px 0 16px rgba(0,0,0,.32);
}


/* ============================================================
   08. BRAND
   ============================================================ */

.brand-link {

    color:
        var(--j-text) !important;

    background:
        var(--j-bark-0) !important;

    border-bottom:
        1px solid rgba(111, 135, 91, .12) !important;

    box-shadow:
        inset 0 -1px 0 rgba(0,0,0,.5);
}


.brand-link:hover {

    color:
        var(--j-amber-light) !important;
}


.brand-text {

    letter-spacing:
        .02em;
}


/* ============================================================
   09. SIDEBAR NAVIGATION
   ============================================================ */

.main-sidebar .nav-link {

    color:
        #aeb7a0 !important;

    margin:
        2px 8px;

    border-radius:
        var(--j-radius-small);

    transition:
        background var(--j-transition),
        color var(--j-transition),
        transform var(--j-transition);
}


.main-sidebar .nav-link:hover {

    color:
        var(--j-white) !important;

    background:
        rgba(76, 106, 70, .13);

    transform:
        translateX(2px);
}


.main-sidebar .nav-icon {

    color:
        #68765d !important;
}


.main-sidebar .nav-link:hover .nav-icon {

    color:
        var(--j-moss-light) !important;
}


/* ============================================================
   10. ACTIVE SIDEBAR ITEM
   ============================================================ */

.sidebar-dark-primary
.nav-sidebar
> .nav-item
> .nav-link.active {

    color:
        #e8edda !important;

    background:
        linear-gradient(
            90deg,
            rgba(63, 91, 56, .82),
            rgba(35, 56, 39, .82)
        ) !important;

    box-shadow:
        inset 3px 0 0 var(--j-moss-light),
        inset 0 1px 0 rgba(160,180,135,.08),
        0 2px 8px rgba(0,0,0,.25);
}


.sidebar-dark-primary
.nav-sidebar
> .nav-item
> .nav-link.active
.nav-icon {

    color:
        var(--j-amber-light) !important;
}


/* ============================================================
   11. SIDEBAR SECTION HEADERS
   ============================================================ */

.nav-sidebar .nav-header {

    color:
        #56634f !important;

    font-size:
        .68rem;

    letter-spacing:
        .16em;

    text-transform:
        uppercase;
}


/* ============================================================
   12. TREEVIEW
   ============================================================ */

.nav-treeview {

    background:
        rgba(0,0,0,.16);
}


.nav-treeview .nav-link {

    color:
        #899681 !important;

    font-size:
        .91rem;
}


.nav-treeview .nav-link.active {

    color:
        #dce4ce !important;

    background:
        rgba(62, 88, 54, .55) !important;
}


/* ============================================================
   13. SIDEBAR MINI
   ============================================================ */

.sidebar-mini .main-sidebar {

    box-shadow:
        4px 0 14px rgba(0,0,0,.30);
}


/* ============================================================
   14. SIDEBAR COLLAPSE
   ============================================================ */

.sidebar-collapse .main-sidebar {

    box-shadow:
        4px 0 14px rgba(0,0,0,.35);
}


/*
   Preserve AdminLTE's collapse behavior.
   Only appearance is changed.
*/

.sidebar-collapse .brand-link {

    background:
        var(--j-bark-0) !important;
}


/* ============================================================
   15. CARDS — DARK LEAF
   ============================================================ */

.card {

    color:
        var(--j-text);

    background-color:
        rgba(24, 43, 31, .94) !important;

    background-image:

        linear-gradient(
            135deg,
            rgba(69, 96, 65, .12),
            transparent 42%
        ),

        repeating-linear-gradient(
            92deg,
            rgba(145,165,125,.018) 0,
            rgba(145,165,125,.018) 1px,
            transparent 1px,
            transparent 11px
        );

    border:
        1px solid var(--j-border) !important;

    border-radius:
        var(--j-radius) !important;

    box-shadow:
        var(--j-shadow) !important;

    overflow:
        hidden;
}


/* tiny upper highlight */

.card::before {

    content:
        "";

    position:
        absolute;

    top:
        0;

    left:
        0;

    right:
        0;

    height:
        1px;

    background:
        rgba(170,190,150,.10);

    pointer-events:
        none;
}


.card-header {

    color:
        var(--j-white) !important;

    background:
        rgba(8, 18, 12, .18) !important;

    border-bottom:
        1px solid var(--j-border) !important;
}


.card-footer {

    background:
        rgba(5, 13, 9, .20) !important;

    border-top:
        1px solid var(--j-border) !important;
}


/* ============================================================
   16. CARD HEADER TITLE
   ============================================================ */

.card-title {

    color:
        var(--j-white) !important;
}


/* ============================================================
   17. BUTTON BASE
   ============================================================ */

.btn {

    color:
        var(--j-text);

    background:
        linear-gradient(
            to bottom,
            #304632,
            #213528
        );

    border:
        1px solid rgba(115,145,100,.24);

    border-radius:
        var(--j-radius-small) !important;

    box-shadow:
        0 2px 0 rgba(0,0,0,.45),
        0 4px 9px rgba(0,0,0,.18),
        inset 0 1px 0 rgba(180,200,160,.08);

    font-weight:
        600;

    transition:
        transform var(--j-transition),
        box-shadow var(--j-transition),
        filter var(--j-transition);
}


.btn:hover {

    color:
        var(--j-white);

    filter:
        brightness(1.08);

    box-shadow:
        0 3px 0 rgba(0,0,0,.48),
        0 6px 12px rgba(0,0,0,.22),
        inset 0 1px 0 rgba(190,210,170,.10);
}


.btn:active {

    transform:
        translateY(2px);

    box-shadow:
        inset 0 2px 5px rgba(0,0,0,.35);
}


/* ============================================================
   18. PRIMARY BUTTON — MOSS
   ============================================================ */

.btn-primary {

    color:
        #eef2df !important;

    background:
        linear-gradient(
            to bottom,
            #486347,
            #304832
        ) !important;

    border-color:
        #5d7954 !important;

    box-shadow:
        0 2px 0 #1d2b1e,
        0 4px 10px rgba(0,0,0,.22),
        inset 0 1px 0 rgba(190,210,165,.12);
}


.btn-primary:hover {

    color:
        #ffffff !important;

    background:
        linear-gradient(
            to bottom,
            #587552,
            #39563a
        ) !important;
}


/* ============================================================
   19. SECONDARY BUTTON — BARK
   ============================================================ */

.btn-secondary {

    color:
        #ded9c7 !important;

    background:
        linear-gradient(
            to bottom,
            var(--j-bark-3),
            var(--j-bark-1)
        ) !important;

    border-color:
        var(--j-bark-4) !important;
}


/* ============================================================
   20. SUCCESS — DEEP GREEN
   ============================================================ */

.btn-success {

    color:
        #edf3df !important;

    background:
        linear-gradient(
            to bottom,
            #4d693d,
            #334a2d
        ) !important;

    border-color:
        #607d4b !important;
}


/* ============================================================
   21. WARNING — FIREFLY
   ============================================================ */

.btn-warning {

    color:
        #211a0d !important;

    background:
        linear-gradient(
            to bottom,
            var(--j-amber-light),
            var(--j-amber)
        ) !important;

    border-color:
        var(--j-amber-dark) !important;

    box-shadow:
        0 2px 0 #59421e,
        0 4px 10px rgba(0,0,0,.20),
        inset 0 1px 0 rgba(255,245,190,.25);
}


/* ============================================================
   22. DANGER — BLOOD / RED
   ============================================================ */

.btn-danger {

    color:
        #f5e4dc !important;

    background:
        linear-gradient(
            to bottom,
            var(--j-red-light),
            var(--j-red-dark)
        ) !important;

    border-color:
        #53231f !important;
}


/* ============================================================
   23. INFO
   ============================================================ */

.btn-info {

    color:
        #e1e7d9 !important;

    background:
        linear-gradient(
            to bottom,
            #4f6559,
            #35483f
        ) !important;

    border-color:
        #61796b !important;
}


/* ============================================================
   24. OUTLINE BUTTONS
   ============================================================ */

.btn-outline-primary {

    color:
        var(--j-moss-light) !important;

    border-color:
        var(--j-moss) !important;

    background:
        transparent;
}


.btn-outline-primary:hover {

    color:
        #edf2df !important;

    background:
        var(--j-green-2) !important;
}


.btn-outline-secondary {

    color:
        #b9b5a4 !important;

    border-color:
        var(--j-bark-4) !important;

    background:
        transparent;
}


.btn-outline-secondary:hover {

    color:
        var(--j-white) !important;

    background:
        var(--j-bark-2) !important;
}


/* ============================================================
   25. FORMS
   ============================================================ */

.form-control,
.form-select,
.custom-select {

    color:
        var(--j-text) !important;

    background-color:
        #14251c !important;

    border:
        1px solid var(--j-border) !important;

    border-radius:
        var(--j-radius-small) !important;

    box-shadow:
        inset 0 1px 4px rgba(0,0,0,.35);

    transition:
        border var(--j-transition),
        box-shadow var(--j-transition);
}


.form-control:focus,
.form-select:focus,
.custom-select:focus {

    color:
        var(--j-white) !important;

    background:
        #172b20 !important;

    border-color:
        var(--j-moss) !important;

    box-shadow:
        0 0 0 2px rgba(102,130,79,.13),
        inset 0 1px 4px rgba(0,0,0,.30) !important;
}


.form-control::placeholder {

    color:
        var(--j-text-muted);

    opacity:
        .8;
}


/* ============================================================
   26. FORM LABEL
   ============================================================ */

label,
.form-label {

    color:
        var(--j-text-soft);

    font-weight:
        600;
}


/* ============================================================
   27. INPUT GROUP
   ============================================================ */

.input-group-text {

    color:
        var(--j-text-soft) !important;

    background:
        var(--j-bark-2) !important;

    border:
        1px solid var(--j-border) !important;
}


/* ============================================================
   28. CHECKBOX / RADIO
   ============================================================ */

.form-check-input {

    background-color:
        #122119;

    border:
        1px solid var(--j-border);

    box-shadow:
        inset 0 1px 3px rgba(0,0,0,.35);
}


.form-check-input:checked {

    background-color:
        var(--j-moss);

    border-color:
        var(--j-moss-light);
}


/* ============================================================
   29. TABLES
   ============================================================ */

.table {

    color:
        var(--j-text);

    --bs-table-bg:
        transparent;

    --bs-table-color:
        var(--j-text);

    border-color:
        var(--j-border);
}


.table thead th {

    color:
        var(--j-white);

    background:
        rgba(4, 13, 8, .38);

    border-bottom:
        1px solid rgba(120,145,100,.25);

    font-weight:
        700;
}


.table tbody td {

    color:
        var(--j-text);

    background:
        rgba(20,37,27,.28);

    border-color:
        rgba(100,125,88,.12);
}


.table tbody tr {

    transition:
        background var(--j-transition);
}


.table tbody tr:hover td {

    background:
        rgba(72,100,61,.12);
}


/* ============================================================
   30. TABLE STRIPES
   ============================================================ */

.table-striped > tbody > tr:nth-of-type(odd) > * {

    --bs-table-accent-bg:
        rgba(70,95,60,.045);
}


/* ============================================================
   31. DROPDOWNS
   ============================================================ */

.dropdown-menu {

    color:
        var(--j-text);

    background:
        #16271e !important;

    border:
        1px solid var(--j-border) !important;

    border-radius:
        var(--j-radius-small) !important;

    box-shadow:
        var(--j-shadow-deep) !important;

    padding:
        5px;
}


.dropdown-item {

    color:
        var(--j-text-soft) !important;

    border-radius:
        3px;

    transition:
        background var(--j-transition),
        color var(--j-transition);
}


.dropdown-item:hover,
.dropdown-item:focus {

    color:
        var(--j-white) !important;

    background:
        rgba(82,108,69,.18) !important;
}


.dropdown-divider {

    border-color:
        var(--j-border);
}


/* ============================================================
   32. MODALS
   ============================================================ */

.modal-content {

    color:
        var(--j-text);

    background:
        #17291f !important;

    border:
        1px solid var(--j-border) !important;

    border-radius:
        4px !important;

    box-shadow:
        0 15px 40px rgba(0,0,0,.50) !important;

    background-image:

        radial-gradient(
            ellipse at 80% 0,
            rgba(76,105,66,.08),
            transparent 35%
        );
}


.modal-header {

    background:
        rgba(5,14,9,.25);

    border-bottom:
        1px solid var(--j-border);
}


.modal-footer {

    background:
        rgba(5,14,9,.20);

    border-top:
        1px solid var(--j-border);
}


.modal-title {

    color:
        var(--j-white);
}


/* ============================================================
   33. MODAL BACKDROP — NIGHT
   ============================================================ */

.modal-backdrop {

    background-color:
        #030806;
}


/* ============================================================
   34. ALERTS
   ============================================================ */

.alert {

    color:
        var(--j-text);

    border-radius:
        var(--j-radius-small);

    border:
        1px solid var(--j-border);

    box-shadow:
        var(--j-shadow);
}


.alert-success {

    background:
        rgba(55,82,46,.72);

    border-color:
        rgba(115,145,90,.30);
}


.alert-info {

    background:
        rgba(49,75,67,.72);

    border-color:
        rgba(110,140,125,.28);
}


.alert-warning {

    color:
        #e8d7ae;

    background:
        rgba(111,82,36,.70);

    border-color:
        rgba(190,150,70,.30);
}


.alert-danger {

    background:
        rgba(104,45,38,.70);

    border-color:
        rgba(170,80,68,.30);
}


/* ============================================================
   35. BADGES
   ============================================================ */

.badge {

    border-radius:
        3px;

    box-shadow:
        0 1px 3px rgba(0,0,0,.25),
        inset 0 1px 0 rgba(255,255,255,.08);
}


.bg-primary,
.badge.bg-primary {

    background:
        var(--j-moss) !important;

    color:
        #edf2df !important;
}


.bg-secondary,
.badge.bg-secondary {

    background:
        var(--j-bark-3) !important;

    color:
        #ddd7c5 !important;
}


.bg-success,
.badge.bg-success {

    background:
        #50683f !important;
}


.bg-warning,
.badge.bg-warning {

    background:
        var(--j-amber) !important;

    color:
        #211a0c !important;
}


.bg-danger,
.badge.bg-danger {

    background:
        var(--j-red) !important;
}


/* ============================================================
   36. BREADCRUMB
   ============================================================ */

.breadcrumb {

    background:
        rgba(18,35,25,.55);

    border:
        1px solid var(--j-border);

    border-radius:
        var(--j-radius-small);

    box-shadow:
        inset 0 1px 0 rgba(170,190,150,.05);
}


.breadcrumb-item {

    color:
        var(--j-text-muted);
}


.breadcrumb-item.active {

    color:
        var(--j-text);
}


/* ============================================================
   37. PAGINATION
   ============================================================ */

.page-link {

    color:
        var(--j-text-soft) !important;

    background:
        #16281f !important;

    border:
        1px solid var(--j-border) !important;

    box-shadow:
        0 1px 3px rgba(0,0,0,.20);
}


.page-link:hover {

    color:
        var(--j-white) !important;

    background:
        #263d2d !important;
}


.page-item.active .page-link {

    color:
        #edf2df !important;

    background:
        var(--j-moss) !important;

    border-color:
        var(--j-moss-light) !important;
}


/* ============================================================
   38. LIST GROUP
   ============================================================ */

.list-group-item {

    color:
        var(--j-text);

    background:
        rgba(21,39,28,.75);

    border:
        1px solid var(--j-border);
}


.list-group-item:hover {

    background:
        rgba(54,80,48,.65);
}


/* ============================================================
   39. ACCORDION
   ============================================================ */

.accordion-item {

    color:
        var(--j-text);

    background:
        var(--j-green-0);

    border:
        1px solid var(--j-border);
}


.accordion-button {

    color:
        var(--j-text);

    background:
        rgba(8,18,12,.28);

    font-weight:
        600;
}


.accordion-button:not(.collapsed) {

    color:
        var(--j-moss-light);

    background:
        rgba(65,91,55,.15);

    box-shadow:
        inset 0 -1px 0 var(--j-border);
}


/* ============================================================
   40. TABS
   ============================================================ */

.nav-tabs {

    border-bottom:
        1px solid var(--j-border);
}


.nav-tabs .nav-link {

    color:
        var(--j-text-muted);

    border:
        1px solid transparent;

    border-radius:
        3px 3px 0 0;
}


.nav-tabs .nav-link:hover {

    color:
        var(--j-text);
}


.nav-tabs .nav-link.active {

    color:
        var(--j-white);

    background:
        var(--j-green-0);

    border-color:
        var(--j-border)
        var(--j-border)
        var(--j-green-0);
}


/* ============================================================
   41. PROGRESS
   ============================================================ */

.progress {

    height:
        10px;

    background:
        #0a150e;

    border:
        1px solid var(--j-border);

    border-radius:
        3px;

    box-shadow:
        inset 0 2px 4px rgba(0,0,0,.45);
}


.progress-bar {

    background:
        linear-gradient(
            to bottom,
            #708451,
            #4a633b
        );

    box-shadow:
        inset 0 1px 0 rgba(200,220,170,.12);
}


/* ============================================================
   42. TOAST
   ============================================================ */

.toast {

    color:
        var(--j-text);

    background:
        #17291f;

    border:
        1px solid var(--j-border);

    box-shadow:
        var(--j-shadow-deep);
}


.toast-header {

    color:
        var(--j-white);

    background:
        #21372a;

    border-bottom:
        1px solid var(--j-border);
}


/* ============================================================
   43. TOOLTIP
   ============================================================ */

.tooltip-inner {

    color:
        #e7ecd9;

    background:
        #0b1510;

    border:
        1px solid rgba(120,145,100,.20);

    border-radius:
        3px;

    box-shadow:
        0 4px 12px rgba(0,0,0,.4);
}


/* ============================================================
   44. POPOVER
   ============================================================ */

.popover {

    color:
        var(--j-text);

    background:
        #17291f;

    border:
        1px solid var(--j-border);

    box-shadow:
        var(--j-shadow-deep);
}


.popover-header {

    color:
        var(--j-white);

    background:
        #203529;

    border-bottom:
        1px solid var(--j-border);
}


/* ============================================================
   45. OFFCANVAS
   ============================================================ */

.offcanvas {

    color:
        var(--j-text);

    background:
        #101f17;

    background-image:

        radial-gradient(
            ellipse at 80% 10%,
            rgba(66,96,58,.10),
            transparent 35%
        );
}


.offcanvas-header {

    border-bottom:
        1px solid var(--j-border);
}


/* ============================================================
   46. CLOSE BUTTON
   ============================================================ */

.btn-close {

    filter:
        invert(1)
        sepia(.15);

    opacity:
        .65;
}


.btn-close:hover {

    opacity:
        1;
}


/* ============================================================
   47. ADMINLTE SMALL BOX
   ============================================================ */

.small-box {

    color:
        var(--j-text) !important;

    background:
        linear-gradient(
            135deg,
            #20392a,
            #13251b
        ) !important;

    border:
        1px solid var(--j-border);

    border-radius:
        4px;

    box-shadow:
        var(--j-shadow);

    overflow:
        hidden;
}


.small-box h3,
.small-box p {

    color:
        var(--j-white) !important;
}


.small-box .icon {

    color:
        rgba(130,155,105,.10) !important;
}


/* ============================================================
   48. ADMINLTE INFO BOX
   ============================================================ */

.info-box {

    color:
        var(--j-text);

    background:
        #182c21 !important;

    border:
        1px solid var(--j-border);

    border-radius:
        4px;

    box-shadow:
        var(--j-shadow);
}


.info-box-icon {

    color:
        #e1e7d4 !important;

    background:
        var(--j-bark-2) !important;
}


.info-box-text {

    color:
        var(--j-text-muted);
}


.info-box-number {

    color:
        var(--j-white);
}


/* ============================================================
   49. ADMINLTE ELEVATION
   ============================================================ */

.elevation-1 {

    box-shadow:
        0 2px 7px rgba(0,0,0,.25) !important;
}


.elevation-2 {

    box-shadow:
        0 4px 10px rgba(0,0,0,.28) !important;
}


.elevation-3 {

    box-shadow:
        0 5px 14px rgba(0,0,0,.32) !important;
}


.elevation-4 {

    box-shadow:
        0 7px 18px rgba(0,0,0,.38) !important;
}


.elevation-5 {

    box-shadow:
        0 10px 28px rgba(0,0,0,.45) !important;
}


/* ============================================================
   50. LOGIN / REGISTER
   ============================================================ */

.login-page,
.register-page {

    color:
        var(--j-text);

    background-color:
        var(--j-night-0) !important;

    background-image:

        radial-gradient(
            ellipse at 50% 0,
            rgba(62,91,57,.18),
            transparent 45%
        ),

        radial-gradient(
            ellipse at 10% 80%,
            rgba(36,63,40,.15),
            transparent 35%
        );
}


.login-box .card,
.register-box .card {

    background:
        #17291f !important;

    border:
        1px solid var(--j-border) !important;

    box-shadow:
        0 12px 35px rgba(0,0,0,.45) !important;
}


.login-logo a,
.register-logo a {

    color:
        var(--j-white) !important;
}


/* ============================================================
   51. FILE INPUT
   ============================================================ */

.form-control[type="file"] {

    background:
        #182b21 !important;
}


/* ============================================================
   52. SELECT
   ============================================================ */

select {

    color:
        var(--j-text) !important;

    background-color:
        #14251c !important;
}


/* ============================================================
   53. HR
   ============================================================ */

hr {

    border:
        0;

    border-top:
        1px solid var(--j-border);

    opacity:
        1;
}


/* ============================================================
   54. BLOCKQUOTE
   ============================================================ */

blockquote {

    color:
        var(--j-text-soft);

    border-left:
        3px solid var(--j-moss);

    background:
        rgba(60,90,50,.06);

    padding:
        .75rem 1rem;
}


/* ============================================================
   55. CODE
   ============================================================ */

code {

    color:
        var(--j-amber-light);

    background:
        rgba(80,70,35,.16);

    border:
        1px solid rgba(130,110,60,.12);

    padding:
        .15rem .35rem;

    border-radius:
        3px;
}


pre {

    color:
        #cfd8c4;

    background:
        #080f0b;

    border:
        1px solid rgba(100,125,90,.18);

    border-radius:
        4px;

    box-shadow:
        inset 0 2px 6px rgba(0,0,0,.4);

    padding:
        1rem;
}


/* ============================================================
   56. SPINNER
   ============================================================ */

.spinner-border {

    color:
        var(--j-moss-light) !important;
}


/* ============================================================
   57. STATUS DOT
   ============================================================ */

.status-dot {

    border:
        2px solid #182b21;

    box-shadow:
        0 0 5px rgba(0,0,0,.4);
}


/* ============================================================
   58. AVATAR
   ============================================================ */

.avatar {

    border:
        2px solid #22392a;

    outline:
        1px solid var(--j-border);

    box-shadow:
        0 3px 7px rgba(0,0,0,.3);
}


/* ============================================================
   59. DISABLED
   ============================================================ */

button:disabled,
.btn:disabled,
.form-control:disabled,
.form-select:disabled {

    opacity:
        .40;

    filter:
        grayscale(.3);

    cursor:
        not-allowed;
}


/* ============================================================
   60. FOCUS
   ============================================================ */

button:focus-visible,
a:focus-visible,
input:focus-visible,
select:focus-visible,
textarea:focus-visible {

    outline:
        2px solid var(--j-amber);

    outline-offset:
        2px;
}


/* ============================================================
   61. SCROLLBAR
   ============================================================ */

::-webkit-scrollbar {

    width:
        10px;

    height:
        10px;
}


::-webkit-scrollbar-track {

    background:
        #080f0b;
}


::-webkit-scrollbar-thumb {

    background:
        #354a37;

    border:
        2px solid #080f0b;

    border-radius:
        3px;
}


::-webkit-scrollbar-thumb:hover {

    background:
        #53684b;
}


/* ============================================================
   62. JUNGLE UTILITY — LEAF
   ============================================================ */

.jungle-leaf {

    background:
        linear-gradient(
            135deg,
            #38573b,
            #1d3325
        );

    border:
        1px solid rgba(130,155,105,.20);

    box-shadow:
        var(--j-shadow);
}


/* ============================================================
   63. JUNGLE UTILITY — BARK
   ============================================================ */

.jungle-bark {

    color:
        #d8d3c0;

    background:
        var(--j-bark-1);

    background-image:

        repeating-linear-gradient(
            88deg,
            rgba(130,95,60,.04) 0,
            rgba(130,95,60,.04) 2px,
            transparent 2px,
            transparent 9px
        );

    border:
        1px solid rgba(120,90,60,.20);

    box-shadow:
        var(--j-shadow);
}


/* ============================================================
   64. JUNGLE UTILITY — MOSS
   ============================================================ */

.jungle-moss {

    color:
        #e5ecd5;

    background:
        var(--j-moss);

    border:
        1px solid var(--j-moss-light);

    box-shadow:
        0 2px 0 var(--j-moss-dark);
}


/* ============================================================
   65. FIREFLY
   ============================================================ */

.jungle-firefly {

    display:
        inline-block;

    width:
        7px;

    height:
        7px;

    border-radius:
        50%;

    background:
        var(--j-amber-light);

    box-shadow:
        0 0 5px rgba(212,170,90,.7),
        0 0 12px rgba(212,170,90,.35);

    animation:
        jungle-firefly-pulse 2.8s ease-in-out infinite;
}


@keyframes jungle-firefly-pulse {

    0%,
    100% {

        opacity:
            .45;

        box-shadow:
            0 0 4px rgba(212,170,90,.35);
    }

    50% {

        opacity:
            1;

        box-shadow:
            0 0 7px rgba(212,170,90,.75),
            0 0 15px rgba(212,170,90,.35);
    }
}


/* ============================================================
   66. MIST
   ============================================================ */

.jungle-mist {

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(135,155,130,.045),
            transparent
        );

    pointer-events:
        none;
}


/* ============================================================
   67. VINE
   ============================================================ */

.jungle-vine {

    position:
        relative;
}


.jungle-vine::before {

    content:
        "";

    position:
        absolute;

    width:
        70px;

    height:
        2px;

    background:
        var(--j-moss-dark);

    opacity:
        .65;

    transform:
        rotate(
            -28deg
        );

    transform-origin:
        left center;
}


/* ============================================================
   68. DANGER MARK
   ============================================================ */

.jungle-danger {

    color:
        #e5b9ac;

    border:
        1px solid rgba(150,65,55,.35);

    background:
        rgba(100,40,34,.18);
}


/* ============================================================
   69. NIGHT PANEL
   ============================================================ */

.jungle-night {

    color:
        var(--j-text);

    background:
        linear-gradient(
            135deg,
            #101e17,
            #07100c
        );

    border:
        1px solid var(--j-border);

    box-shadow:
        var(--j-shadow-deep);
}


/* ============================================================
   70. FIELD NOTE
   ============================================================ */

.jungle-note {

    color:
        #d8d6bd;

    background:
        linear-gradient(
            135deg,
            rgba(75,79,50,.30),
            rgba(44,53,36,.25)
        );

    border-left:
        3px solid var(--j-moss-light);

    padding:
        1rem;

    box-shadow:
        var(--j-shadow);
}


/* ============================================================
   71. SPECIMEN / DISCOVERY CARD
   ============================================================ */

.jungle-specimen {

    position:
        relative;

    color:
        var(--j-text);

    background:
        #13241b;

    border:
        1px solid rgba(130,150,105,.18);

    box-shadow:
        var(--j-shadow);

    overflow:
        hidden;
}


.jungle-specimen::after {

    content:
        "";

    position:
        absolute;

    right:
        -25px;

    top:
        -25px;

    width:
        90px;

    height:
        90px;

    border:
        1px solid rgba(125,150,100,.07);

    border-radius:
        50%;

    transform:
        rotate(25deg);
}


/* ============================================================
   72. SCRATCH / NATURAL IMPERFECTION
   ============================================================ */

.jungle-scratch {

    position:
        relative;
}


.jungle-scratch::after {

    content:
        "";

    position:
        absolute;

    left:
        10%;

    right:
        10%;

    bottom:
        5px;

    height:
        1px;

    background:
        rgba(145,160,120,.08);

    transform:
        rotate(-.5deg);
}


/* ============================================================
   73. ORGANIC DIVIDER
   ============================================================ */

.jungle-divider {

    height:
        1px;

    margin:
        1rem 0;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(100,130,85,.25),
            transparent
        );
}


/* ============================================================
   74. FOOTER
   ============================================================ */

.main-footer {

    color:
        var(--j-text-muted) !important;

    background:
        #0b1711 !important;

    border-top:
        1px solid var(--j-border-dark) !important;
}


/* ============================================================
   75. NAVBAR DROPDOWN
   ============================================================ */

.navbar-nav .dropdown-menu {

    margin-top:
        4px;
}


/* ============================================================
   76. RESPONSIVE
   ============================================================ */

@media (max-width: 767.98px) {

    .card {

        box-shadow:
            0 3px 10px rgba(0,0,0,.28) !important;
    }

    .main-header {

        box-shadow:
            0 2px 8px rgba(0,0,0,.30) !important;
    }

    .btn {

        box-shadow:
            0 2px 0 rgba(0,0,0,.35);
    }
}


/* ============================================================
   77. REDUCED MOTION
   ============================================================ */

@media (prefers-reduced-motion: reduce) {

    *,
    *::before,
    *::after {

        animation:
            none !important;

        transition:
            none !important;
    }
}
</style>
