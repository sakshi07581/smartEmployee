<style>
    /* ============================================================
   KAGAZ ROSHAN UI — V2
   Nepali Kagaz / Physical Paper Theme
   ------------------------------------------------------------
   Concept:
   - Kagaz      → surfaces
   - Lokta      → paper texture
   - Ink        → typography
   - Lal Ink    → primary/action
   - Wood       → navigation
   - Brass      → accents
   - Charcoal   → shadows/borders
   ============================================================ */


/* ============================================================
   01. DESIGN TOKENS
   ============================================================ */

:root {

    /* ---------- PAPER ---------- */

    --kagaz-0: #f4edda;
    --kagaz-1: #eee4c9;
    --kagaz-2: #e5d8b9;
    --kagaz-3: #d9c9a5;
    --kagaz-dark: #c8b68e;

    /* ---------- PAPER SHADOW ---------- */

    --paper-shadow:
        0 2px 0 rgba(74, 58, 35, .18),
        0 5px 12px rgba(54, 42, 25, .12);

    --paper-shadow-deep:
        0 3px 0 rgba(62, 47, 29, .25),
        0 8px 18px rgba(48, 36, 21, .18);

    --paper-inset:
        inset 0 1px 0 rgba(255,255,255,.45),
        inset 0 -1px 0 rgba(80,60,35,.15);


    /* ---------- INK ---------- */

    --ink: #29261f;
    --ink-soft: #4b463b;
    --ink-muted: #716958;
    --ink-faded: #928874;

    --ink-black: #201e19;


    /* ---------- NEPALI RED / LAL ---------- */

    --lal: #8d3028;
    --lal-dark: #6f241f;
    --lal-light: #aa463d;
    --lal-faded: #c47b70;


    /* ---------- WOOD ---------- */

    --wood: #594536;
    --wood-dark: #3c2e24;
    --wood-light: #735a45;
    --wood-highlight: #866a50;


    /* ---------- BRASS ---------- */

    --brass: #9b783d;
    --brass-light: #b49559;
    --brass-dark: #705528;


    /* ---------- STONE ---------- */

    --stone: #777062;
    --stone-light: #aaa292;
    --stone-dark: #565146;


    /* ---------- BORDERS ---------- */

    --kagaz-border: rgba(74, 56, 31, .28);
    --kagaz-border-dark: rgba(55, 40, 25, .45);


    /* ---------- RADII ---------- */

    --kagaz-radius: 3px;
    --kagaz-radius-small: 2px;


    /* ---------- TRANSITIONS ---------- */

    --kagaz-transition:
        140ms ease;


    /* ---------- FONT ---------- */

    --kagaz-font:
        "Segoe UI",
        "Noto Sans",
        Arial,
        sans-serif;
}


/* ============================================================
   02. GLOBAL PAPER BODY
   ============================================================ */

html,
body {

    font-family: var(--kagaz-font);

    color: var(--ink);

    background-color: var(--kagaz-2);

}


/*
   Paper surface.

   Multiple gradients create subtle:
   - fibers
   - paper direction
   - aged patches
   - uneven surface
*/

body {

    background-color: var(--kagaz-2);

    background-image:

        /* horizontal fibers */
        repeating-linear-gradient(
            0deg,
            rgba(70, 50, 25, .025) 0px,
            rgba(70, 50, 25, .025) 1px,
            transparent 1px,
            transparent 4px
        ),

        /* vertical fibers */
        repeating-linear-gradient(
            90deg,
            rgba(255,255,255,.035) 0px,
            rgba(255,255,255,.035) 1px,
            transparent 1px,
            transparent 7px
        ),

        /* aged paper patches */
        radial-gradient(
            circle at 20% 20%,
            rgba(120,90,45,.08),
            transparent 35%
        ),

        radial-gradient(
            circle at 80% 70%,
            rgba(90,65,35,.06),
            transparent 40%
        );

    background-attachment: fixed;
}


/* ============================================================
   03. TYPOGRAPHY
   ============================================================ */

body,
p,
span,
div,
label,
small {

    color: var(--ink);
}


h1,
h2,
h3,
h4,
h5,
h6 {

    color: var(--ink-black);

    font-weight: 700;

    letter-spacing: -.01em;
}


.text-muted {

    color: var(--ink-muted) !important;
}


a {

    color: var(--lal);

    text-decoration: none;

    transition:
        color var(--kagaz-transition);
}


a:hover {

    color: var(--lal-dark);

    text-decoration: underline;
}


/* ============================================================
   04. MAIN CONTENT
   ============================================================ */

.content-wrapper {

    background: transparent !important;
}


.content {

    background: transparent;
}


/* ============================================================
   05. ADMINLTE NAVBAR
   ============================================================ */

.main-header {

    background-color: var(--kagaz-1) !important;

    border-bottom:
        1px solid var(--kagaz-border-dark) !important;

    box-shadow:
        0 2px 5px rgba(50,35,20,.14) !important;

    background-image:

        repeating-linear-gradient(
            0deg,
            rgba(80,55,30,.025) 0px,
            rgba(80,55,30,.025) 1px,
            transparent 1px,
            transparent 5px
        );
}


/* Navbar links */

.main-header .nav-link {

    color: var(--ink-soft) !important;

    transition:
        background var(--kagaz-transition),
        color var(--kagaz-transition);
}


.main-header .nav-link:hover {

    color: var(--ink-black) !important;

    background: rgba(120,90,50,.08);
}


/* Navbar buttons */

.main-header .btn {

    box-shadow: none;
}


/* ============================================================
   06. ADMINLTE SIDEBAR
   ============================================================ */

.main-sidebar {

    background-color: var(--wood-dark) !important;

    border-right:
        1px solid rgba(30,20,12,.65);

    box-shadow:
        4px 0 10px rgba(30,20,12,.18);

    background-image:

        repeating-linear-gradient(
            90deg,
            rgba(255,255,255,.025) 0px,
            rgba(255,255,255,.025) 1px,
            transparent 1px,
            transparent 5px
        ),

        repeating-linear-gradient(
            0deg,
            rgba(0,0,0,.025) 0px,
            rgba(0,0,0,.025) 1px,
            transparent 1px,
            transparent 7px
        );
}


/* Remove AdminLTE blue */

.sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active {

    background-color: var(--lal) !important;

    color: #f7ead0 !important;

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.15),
        inset 0 -2px 0 rgba(40,20,10,.25),
        0 2px 3px rgba(20,10,5,.2);
}


/* Sidebar links */

.main-sidebar .nav-link {

    color: #e4d5b8 !important;

    border-radius:
        var(--kagaz-radius);

    margin:
        2px 8px;

    transition:
        background var(--kagaz-transition),
        transform var(--kagaz-transition);
}


.main-sidebar .nav-link:hover {

    color: #f5e8cd !important;

    background:
        rgba(180,150,100,.12);

    transform:
        translateX(2px);
}


/* Active */

.main-sidebar .nav-link.active {

    color: #fff1d0 !important;

    background:
        linear-gradient(
            to bottom,
            var(--lal-light),
            var(--lal-dark)
        ) !important;
}


/* Icons */

.main-sidebar .nav-icon {

    color: var(--brass-light) !important;
}


.main-sidebar .nav-link.active .nav-icon {

    color: #f1d38b !important;
}


/* Sidebar section labels */

.nav-sidebar .nav-header {

    color: #a99473 !important;

    font-size: .7rem;

    letter-spacing: .12em;

    text-transform: uppercase;
}


/* ============================================================
   07. BRAND
   ============================================================ */

.brand-link {

    background:
        var(--wood-dark) !important;

    color:
        #eadcbe !important;

    border-bottom:
        1px solid rgba(255,255,255,.08) !important;

    box-shadow:
        inset 0 -1px 0 rgba(0,0,0,.35);
}


.brand-link:hover {

    color:
        #fff0cf !important;
}


.brand-image {

    box-shadow:
        0 1px 3px rgba(0,0,0,.4);
}


/* ============================================================
   08. CARDS
   ============================================================ */

.card {

    color: var(--ink);

    background-color: var(--kagaz-1) !important;

    border:
        1px solid var(--kagaz-border) !important;

    border-radius:
        var(--kagaz-radius) !important;

    box-shadow:
        var(--paper-shadow) !important;

    overflow: hidden;

    background-image:

        repeating-linear-gradient(
            0deg,
            rgba(80,55,30,.018) 0px,
            rgba(80,55,30,.018) 1px,
            transparent 1px,
            transparent 5px
        );
}


/* Card header */

.card-header {

    background:
        rgba(130,100,60,.07) !important;

    border-bottom:
        1px solid var(--kagaz-border) !important;

    color:
        var(--ink-black) !important;
}


/* Card footer */

.card-footer {

    background:
        rgba(90,65,35,.05) !important;

    border-top:
        1px solid var(--kagaz-border) !important;
}


/* ============================================================
   09. BUTTONS
   ============================================================ */

.btn {

    border-radius:
        var(--kagaz-radius-small) !important;

    border:
        1px solid var(--kagaz-border-dark);

    font-weight:
        600;

    color:
        var(--ink);

    background:
        linear-gradient(
            to bottom,
            #f2e8cd,
            #dfd0ae
        );

    box-shadow:
        0 2px 0 rgba(75,55,30,.28),
        0 3px 5px rgba(60,40,20,.08),
        inset 0 1px 0 rgba(255,255,255,.55);

    transition:
        transform var(--kagaz-transition),
        box-shadow var(--kagaz-transition),
        filter var(--kagaz-transition);
}


.btn:hover {

    color:
        var(--ink-black);

    filter:
        brightness(1.04);

    box-shadow:
        0 3px 0 rgba(75,55,30,.3),
        0 5px 8px rgba(60,40,20,.12),
        inset 0 1px 0 rgba(255,255,255,.6);
}


.btn:active {

    transform:
        translateY(2px);

    box-shadow:
        inset 0 2px 4px rgba(50,35,20,.2);
}


/* ---------- PRIMARY ---------- */

.btn-primary {

    color:
        #f9ecd0 !important;

    background:
        linear-gradient(
            to bottom,
            var(--lal-light),
            var(--lal-dark)
        ) !important;

    border-color:
        var(--lal-dark) !important;

    box-shadow:
        0 2px 0 #572019,
        0 4px 7px rgba(60,25,20,.18),
        inset 0 1px 0 rgba(255,255,255,.15);
}


.btn-primary:hover {

    color:
        #fff5dc !important;

    background:
        linear-gradient(
            to bottom,
            #b14c42,
            #79261f
        ) !important;
}


/* ---------- SECONDARY ---------- */

.btn-secondary {

    color:
        #eee0c4 !important;

    background:
        linear-gradient(
            to bottom,
            var(--wood-light),
            var(--wood-dark)
        ) !important;

    border-color:
        var(--wood-dark) !important;
}


/* ---------- SUCCESS ---------- */

.btn-success {

    color: #f4ecd9 !important;

    background:
        linear-gradient(
            to bottom,
            #667047,
            #4c5733
        ) !important;

    border-color:
        #41492c !important;
}


/* ---------- DANGER ---------- */

.btn-danger {

    color: #fff0df !important;

    background:
        linear-gradient(
            to bottom,
            #a4473c,
            #722820
        ) !important;

    border-color:
        #60221c !important;
}


/* ---------- WARNING ---------- */

.btn-warning {

    color:
        #382b18 !important;

    background:
        linear-gradient(
            to bottom,
            #c9a762,
            #a58245
        ) !important;

    border-color:
        #876b37 !important;
}


/* ---------- INFO ---------- */

.btn-info {

    color:
        #302c23 !important;

    background:
        linear-gradient(
            to bottom,
            #a9aaa0,
            #85867d
        ) !important;

    border-color:
        #6f7068 !important;
}


/* ============================================================
   10. OUTLINE BUTTONS
   ============================================================ */

.btn-outline-primary {

    color:
        var(--lal) !important;

    border-color:
        var(--lal) !important;

    background:
        transparent;
}


.btn-outline-primary:hover {

    color:
        #f8ecd5 !important;

    background:
        var(--lal) !important;
}


.btn-outline-secondary {

    color:
        var(--wood-dark) !important;

    border-color:
        var(--wood) !important;
}


.btn-outline-secondary:hover {

    color:
        #f5e6ca !important;

    background:
        var(--wood) !important;
}


/* ============================================================
   11. FORMS
   ============================================================ */

.form-control,
.form-select,
.custom-select {

    color:
        var(--ink);

    background-color:
        #eee3c6 !important;

    border:
        1px solid var(--kagaz-border-dark) !important;

    border-radius:
        2px !important;

    box-shadow:
        inset 0 1px 3px rgba(70,50,25,.12),
        inset 0 0 0 1px rgba(255,255,255,.2);

    transition:
        border var(--kagaz-transition),
        box-shadow var(--kagaz-transition);
}


.form-control:focus,
.form-select:focus,
.custom-select:focus {

    color:
        var(--ink-black);

    background:
        #f2e8ce !important;

    border-color:
        var(--lal) !important;

    box-shadow:
        0 0 0 2px rgba(141,48,40,.12),
        inset 0 1px 3px rgba(70,50,25,.1) !important;
}


.form-control::placeholder {

    color:
        var(--ink-faded);

    opacity:
        .8;
}


/* Labels */

label,
.form-label {

    color:
        var(--ink-soft);

    font-weight:
        600;
}


/* Input group */

.input-group-text {

    color:
        var(--ink-soft) !important;

    background:
        var(--kagaz-2) !important;

    border:
        1px solid var(--kagaz-border-dark) !important;
}


/* ============================================================
   12. CHECKBOX / RADIO
   ============================================================ */

.form-check-input {

    background-color:
        var(--kagaz-0);

    border:
        1px solid var(--kagaz-border-dark);

    box-shadow:
        inset 0 1px 2px rgba(50,35,20,.15);
}


.form-check-input:checked {

    background-color:
        var(--lal);

    border-color:
        var(--lal-dark);
}


/* ============================================================
   13. TABLES
   ============================================================ */

.table {

    color:
        var(--ink);

    --bs-table-bg:
        transparent;

    border-color:
        var(--kagaz-border);
}


.table thead th {

    color:
        var(--ink-black);

    background:
        rgba(110,80,45,.10);

    border-bottom:
        2px solid var(--kagaz-border-dark);

    font-weight:
        700;
}


.table tbody td {

    border-color:
        rgba(80,60,35,.16);

    background:
        rgba(244,237,218,.20);
}


.table tbody tr:hover td {

    background:
        rgba(141,48,40,.055);
}


/* Striped */

.table-striped > tbody > tr:nth-of-type(odd) > * {

    --bs-table-accent-bg:
        rgba(110,80,45,.045);
}


/* ============================================================
   14. DROPDOWN
   ============================================================ */

.dropdown-menu {

    color:
        var(--ink);

    background:
        var(--kagaz-1) !important;

    border:
        1px solid var(--kagaz-border-dark) !important;

    border-radius:
        2px !important;

    box-shadow:
        var(--paper-shadow-deep) !important;

    padding:
        5px;
}


.dropdown-item {

    color:
        var(--ink-soft) !important;

    border-radius:
        2px;

    transition:
        background var(--kagaz-transition);
}


.dropdown-item:hover,
.dropdown-item:focus {

    color:
        var(--ink-black) !important;

    background:
        rgba(141,48,40,.09) !important;
}


.dropdown-divider {

    border-color:
        var(--kagaz-border);
}


/* ============================================================
   15. MODALS
   ============================================================ */

.modal-content {

    color:
        var(--ink);

    background:
        var(--kagaz-1) !important;

    border:
        1px solid var(--kagaz-border-dark) !important;

    border-radius:
        3px !important;

    box-shadow:
        0 12px 30px rgba(40,25,12,.28) !important;

    background-image:

        repeating-linear-gradient(
            0deg,
            rgba(80,55,30,.02) 0px,
            rgba(80,55,30,.02) 1px,
            transparent 1px,
            transparent 5px
        );
}


.modal-header {

    background:
        rgba(100,75,40,.08);

    border-bottom:
        1px solid var(--kagaz-border);
}


.modal-footer {

    background:
        rgba(90,65,35,.05);

    border-top:
        1px solid var(--kagaz-border);
}


.modal-backdrop {

    background-color:
        #292219;
}


/* ============================================================
   16. ALERTS
   ============================================================ */

.alert {

    border-radius:
        2px;

    border:
        1px solid var(--kagaz-border-dark);

    box-shadow:
        var(--paper-shadow);

    color:
        var(--ink);
}


/* Info */

.alert-info {

    background:
        #d7d6c5;

    border-color:
        #9d9b88;
}


/* Success */

.alert-success {

    background:
        #d8dbc1;

    border-color:
        #89906b;
}


/* Warning */

.alert-warning {

    background:
        #eadbb5;

    border-color:
        #ad8c4c;
}


/* Danger */

.alert-danger {

    background:
        #e5c5b9;

    border-color:
        #a15a4d;
}


/* ============================================================
   17. BADGES
   ============================================================ */

.badge {

    border-radius:
        2px;

    font-weight:
        700;

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.18),
        0 1px 2px rgba(50,30,15,.15);
}


.bg-primary,
.badge.bg-primary {

    background:
        var(--lal) !important;

    color:
        #f7ead1 !important;
}


.bg-secondary,
.badge.bg-secondary {

    background:
        var(--wood) !important;

    color:
        #eee1c7 !important;
}


.bg-success,
.badge.bg-success {

    background:
        #59653c !important;
}


.bg-warning,
.badge.bg-warning {

    background:
        var(--brass) !important;

    color:
        #fff0c9 !important;
}


.bg-danger,
.badge.bg-danger {

    background:
        #8d3028 !important;
}


/* ============================================================
   18. BREADCRUMB
   ============================================================ */

.breadcrumb {

    background:
        rgba(110,80,45,.06);

    border:
        1px solid var(--kagaz-border);

    border-radius:
        2px;

    padding:
        .55rem .8rem;

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.3);
}


.breadcrumb-item {

    color:
        var(--ink-muted);
}


.breadcrumb-item.active {

    color:
        var(--ink);
}


/* ============================================================
   19. PAGINATION
   ============================================================ */

.page-link {

    color:
        var(--ink-soft) !important;

    background:
        var(--kagaz-1) !important;

    border:
        1px solid var(--kagaz-border) !important;

    box-shadow:
        0 1px 0 rgba(70,50,30,.15);
}


.page-link:hover {

    color:
        var(--lal) !important;

    background:
        var(--kagaz-2) !important;
}


.page-item.active .page-link {

    color:
        #f8ecd4 !important;

    background:
        var(--lal) !important;

    border-color:
        var(--lal-dark) !important;
}


/* ============================================================
   20. LIST GROUP
   ============================================================ */

.list-group-item {

    color:
        var(--ink);

    background:
        rgba(238,228,201,.75);

    border:
        1px solid var(--kagaz-border);
}


.list-group-item:hover {

    background:
        rgba(220,205,170,.8);
}


/* ============================================================
   21. ACCORDION
   ============================================================ */

.accordion-item {

    background:
        var(--kagaz-1);

    border:
        1px solid var(--kagaz-border);
}


.accordion-button {

    color:
        var(--ink-black);

    background:
        rgba(110,80,45,.07);

    font-weight:
        600;
}


.accordion-button:not(.collapsed) {

    color:
        var(--lal-dark);

    background:
        rgba(141,48,40,.07);

    box-shadow:
        inset 0 -1px 0 var(--kagaz-border);
}


/* ============================================================
   22. NAV TABS
   ============================================================ */

.nav-tabs {

    border-bottom:
        1px solid var(--kagaz-border-dark);
}


.nav-tabs .nav-link {

    color:
        var(--ink-muted);

    border:
        1px solid transparent;

    border-radius:
        2px 2px 0 0;
}


.nav-tabs .nav-link:hover {

    color:
        var(--ink);
}


.nav-tabs .nav-link.active {

    color:
        var(--ink-black);

    background:
        var(--kagaz-1);

    border-color:
        var(--kagaz-border-dark)
        var(--kagaz-border-dark)
        var(--kagaz-1);
}


/* ============================================================
   23. PROGRESS
   ============================================================ */

.progress {

    height:
        10px;

    background:
        #cfc09e;

    border:
        1px solid rgba(70,50,30,.25);

    border-radius:
        2px;

    box-shadow:
        inset 0 1px 3px rgba(50,35,20,.2);
}


.progress-bar {

    background:
        linear-gradient(
            to bottom,
            var(--lal-light),
            var(--lal-dark)
        );

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.15);
}


/* ============================================================
   24. TOAST
   ============================================================ */

.toast {

    color:
        var(--ink);

    background:
        var(--kagaz-1);

    border:
        1px solid var(--kagaz-border-dark);

    box-shadow:
        var(--paper-shadow-deep);
}


.toast-header {

    color:
        var(--ink-black);

    background:
        var(--kagaz-2);

    border-bottom:
        1px solid var(--kagaz-border);
}


/* ============================================================
   25. TOOLTIP
   ============================================================ */

.tooltip-inner {

    color:
        #f1e5c9;

    background:
        var(--wood-dark);

    border:
        1px solid #241b15;

    border-radius:
        2px;

    box-shadow:
        0 3px 7px rgba(30,20,10,.25);
}


/* ============================================================
   26. POPOVER
   ============================================================ */

.popover {

    color:
        var(--ink);

    background:
        var(--kagaz-1);

    border:
        1px solid var(--kagaz-border-dark);

    border-radius:
        2px;

    box-shadow:
        var(--paper-shadow-deep);
}


.popover-header {

    color:
        var(--ink-black);

    background:
        rgba(110,80,45,.08);

    border-bottom:
        1px solid var(--kagaz-border);
}


/* ============================================================
   27. OFFCANVAS
   ============================================================ */

.offcanvas {

    color:
        var(--ink);

    background:
        var(--kagaz-1);

    background-image:

        repeating-linear-gradient(
            0deg,
            rgba(70,50,25,.025) 0px,
            rgba(70,50,25,.025) 1px,
            transparent 1px,
            transparent 5px
        );
}


.offcanvas-header {

    border-bottom:
        1px solid var(--kagaz-border);
}


/* ============================================================
   28. CLOSE BUTTON
   ============================================================ */

.btn-close {

    filter:
        sepia(.5);
}


/* ============================================================
   29. ADMINLTE SMALL BOX
   ============================================================ */

.small-box {

    color:
        var(--ink) !important;

    background:
        var(--kagaz-1) !important;

    border:
        1px solid var(--kagaz-border-dark);

    border-radius:
        3px;

    box-shadow:
        var(--paper-shadow);

    overflow:
        hidden;
}


.small-box h3,
.small-box p {

    color:
        var(--ink-black) !important;
}


.small-box .icon {

    color:
        rgba(90,65,35,.16) !important;
}


/* ============================================================
   30. ADMINLTE INFO BOX
   ============================================================ */

.info-box {

    color:
        var(--ink);

    background:
        var(--kagaz-1) !important;

    border:
        1px solid var(--kagaz-border);

    box-shadow:
        var(--paper-shadow);

    border-radius:
        3px;
}


.info-box-icon {

    color:
        #f1e4c8 !important;

    background:
        var(--wood) !important;
}


.info-box-text {

    color:
        var(--ink-muted);
}


.info-box-number {

    color:
        var(--ink-black);
}


/* ============================================================
   31. ADMINLTE ELEVATION
   ============================================================ */

.elevation-1 {

    box-shadow:
        0 2px 5px rgba(55,40,20,.12) !important;
}


.elevation-2 {

    box-shadow:
        0 3px 8px rgba(55,40,20,.15) !important;
}


.elevation-3 {

    box-shadow:
        0 5px 12px rgba(55,40,20,.18) !important;
}


.elevation-4 {

    box-shadow:
        0 6px 15px rgba(40,28,15,.22) !important;
}


.elevation-5 {

    box-shadow:
        0 9px 22px rgba(35,25,14,.26) !important;
}


/* ============================================================
   32. ADMINLTE TREEVIEW
   ============================================================ */

.nav-treeview {

    background:
        rgba(20,12,8,.14);
}


.nav-treeview .nav-link {

    color:
        #cdbd9e !important;

    font-size:
        .92rem;
}


.nav-treeview .nav-link:hover {

    background:
        rgba(180,150,100,.09);
}


.nav-treeview .nav-link.active {

    background:
        rgba(141,48,40,.75) !important;
}


/* ============================================================
   33. LOGIN / AUTH PAGES
   ============================================================ */

.login-page,
.register-page {

    background-color:
        var(--kagaz-2) !important;

    background-image:

        repeating-linear-gradient(
            0deg,
            rgba(70,50,25,.03) 0px,
            rgba(70,50,25,.03) 1px,
            transparent 1px,
            transparent 5px
        );
}


.login-box .card,
.register-box .card {

    background:
        var(--kagaz-1) !important;

    border:
        1px solid var(--kagaz-border-dark) !important;

    box-shadow:
        0 8px 25px rgba(50,35,20,.2) !important;
}


/* ============================================================
   34. LOGIN LOGO
   ============================================================ */

.login-logo a,
.register-logo a {

    color:
        var(--ink-black) !important;

    font-weight:
        800;
}


/* ============================================================
   35. TABLE RESPONSIVE
   ============================================================ */

.table-responsive {

    border-radius:
        2px;
}


/* ============================================================
   36. FILE INPUT
   ============================================================ */

.form-control[type="file"] {

    background:
        var(--kagaz-2) !important;
}


/* ============================================================
   37. SELECT
   ============================================================ */

select {

    color:
        var(--ink) !important;

    background-color:
        var(--kagaz-1) !important;
}


/* ============================================================
   38. HR
   ============================================================ */

hr {

    border:
        0;

    border-top:
        1px solid var(--kagaz-border-dark);

    opacity:
        .7;
}


/* ============================================================
   39. BLOCKQUOTE
   ============================================================ */

blockquote {

    border-left:
        4px solid var(--lal);

    padding-left:
        1rem;

    color:
        var(--ink-soft);

    background:
        rgba(141,48,40,.035);
}


/* ============================================================
   40. CODE
   ============================================================ */

code {

    color:
        var(--lal-dark);

    background:
        rgba(110,80,45,.09);

    padding:
        .15rem .35rem;

    border-radius:
        2px;
}


pre {

    color:
        #e8dcc1;

    background:
        var(--wood-dark);

    border:
        1px solid #2d2118;

    border-radius:
        3px;

    padding:
        1rem;

    box-shadow:
        inset 0 1px 3px rgba(0,0,0,.3);
}


/* ============================================================
   41. AVATARS
   ============================================================ */

.avatar {

    border:
        2px solid var(--kagaz-1);

    outline:
        1px solid var(--kagaz-border-dark);

    box-shadow:
        0 2px 4px rgba(50,35,20,.18);
}


/* ============================================================
   42. STATUS DOT
   ============================================================ */

.status-dot {

    border:
        2px solid var(--kagaz-1);

    box-shadow:
        0 1px 3px rgba(40,25,10,.25);
}


/* ============================================================
   43. SPINNER
   ============================================================ */

.spinner-border {

    color:
        var(--lal) !important;
}


/* ============================================================
   44. DISABLED
   ============================================================ */

button:disabled,
.btn:disabled,
.form-control:disabled,
.form-select:disabled {

    opacity:
        .55;

    filter:
        grayscale(.25);

    cursor:
        not-allowed;
}


/* ============================================================
   45. FOCUS ACCESSIBILITY
   ============================================================ */

button:focus-visible,
a:focus-visible,
input:focus-visible,
select:focus-visible,
textarea:focus-visible {

    outline:
        2px solid var(--lal);

    outline-offset:
        2px;
}


/* ============================================================
   46. SCROLLBAR — WOOD
   ============================================================ */

::-webkit-scrollbar {

    width:
        10px;

    height:
        10px;
}


::-webkit-scrollbar-track {

    background:
        var(--kagaz-3);
}


::-webkit-scrollbar-thumb {

    background:
        var(--wood-light);

    border:
        2px solid var(--kagaz-3);

    border-radius:
        2px;
}


::-webkit-scrollbar-thumb:hover {

    background:
        var(--wood);
}


/* ============================================================
   47. SIDEBAR MINI
   ============================================================ */

.sidebar-mini .main-sidebar {

    box-shadow:
        3px 0 8px rgba(30,20,12,.18);
}


/* ============================================================
   48. SIDEBAR COLLAPSED
   ------------------------------------------------------------
   Important:
   Do NOT modify AdminLTE positioning/display behavior.
   Only modify appearance.
   ============================================================ */

.sidebar-collapse .main-sidebar {

    box-shadow:
        3px 0 8px rgba(30,20,12,.20);
}


.sidebar-collapse .brand-link {

    background:
        var(--wood-dark) !important;
}


/* ============================================================
   49. SIDEBAR-CLOSED
   ============================================================ */

.sidebar-closed .main-sidebar {

    box-shadow:
        3px 0 8px rgba(30,20,12,.20);
}


/* ============================================================
   50. FOOTER
   ============================================================ */

.main-footer {

    color:
        var(--ink-muted) !important;

    background:
        rgba(218,201,165,.75) !important;

    border-top:
        1px solid var(--kagaz-border-dark) !important;
}


/* ============================================================
   51. SEARCH INPUT
   ============================================================ */

.form-control-navbar {

    color:
        var(--ink) !important;

    background:
        rgba(235,223,194,.85) !important;

    border:
        1px solid var(--kagaz-border-dark) !important;
}


/* ============================================================
   52. NAVBAR DROPDOWN USER MENU
   ============================================================ */

.navbar-nav .dropdown-menu {

    margin-top:
        4px;
}


/* ============================================================
   53. CARDS — PHYSICAL PAPER EDGE
   ============================================================ */

.card,
.small-box,
.info-box {

    position:
        relative;
}


/*
   Tiny paper highlight.
*/

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
        rgba(255,255,255,.38);

    pointer-events:
        none;
}


/* ============================================================
   54. PAPER UTILITY
   ============================================================ */

.kagaz {

    background:
        var(--kagaz-1);

    border:
        1px solid var(--kagaz-border);

    box-shadow:
        var(--paper-shadow);
}


/* ============================================================
   55. WOOD UTILITY
   ============================================================ */

.kagaz-wood {

    color:
        #eadbc0;

    background:
        var(--wood-dark);

    border:
        1px solid #302219;

    box-shadow:
        0 3px 7px rgba(30,20,10,.2);
}


/* ============================================================
   56. LAL INK UTILITY
   ============================================================ */

.kagaz-lal {

    color:
        #f5e6ca;

    background:
        var(--lal);

    border:
        1px solid var(--lal-dark);

    box-shadow:
        0 2px 0 #5e211b;
}


/* ============================================================
   57. BRASS UTILITY
   ============================================================ */

.kagaz-brass {

    color:
        #fff0c9;

    background:
        var(--brass);

    border:
        1px solid var(--brass-dark);

    box-shadow:
        0 2px 0 var(--brass-dark);
}


/* ============================================================
   58. PAPER NOTE
   ============================================================ */

.kagaz-note {

    background:
        #e9d9b4;

    border-left:
        4px solid var(--lal);

    padding:
        1rem;

    box-shadow:
        2px 3px 8px rgba(60,40,20,.12);
}


/* ============================================================
   59. STAMP
   ============================================================ */

.kagaz-stamp {

    display:
        inline-block;

    color:
        var(--lal);

    border:
        2px solid var(--lal);

    padding:
        .25rem .6rem;

    font-weight:
        800;

    letter-spacing:
        .08em;

    text-transform:
        uppercase;

    transform:
        rotate(-2deg);

    opacity:
        .82;
}


/* ============================================================
   60. PAPER PRESS EFFECT
   ============================================================ */

.kagaz-press {

    transition:
        transform var(--kagaz-transition),
        box-shadow var(--kagaz-transition);
}


.kagaz-press:hover {

    transform:
        translateY(-1px);

    box-shadow:
        var(--paper-shadow-deep);
}


.kagaz-press:active {

    transform:
        translateY(2px);

    box-shadow:
        inset 0 2px 4px rgba(60,40,20,.18);
}


/* ============================================================
   61. RED INK UNDERLINE
   ============================================================ */

.kagaz-underline {

    position:
        relative;

    display:
        inline-block;
}


.kagaz-underline::after {

    content:
        "";

    position:
        absolute;

    left:
        0;

    bottom:
        -3px;

    width:
        100%;

    height:
        2px;

    background:
        var(--lal);

    transform:
        rotate(-1deg);

    opacity:
        .75;
}


/* ============================================================
   62. PAPER DIVIDER
   ============================================================ */

.kagaz-divider {

    height:
        1px;

    background:
        var(--kagaz-border-dark);

    box-shadow:
        0 1px 0 rgba(255,255,255,.3);

    margin:
        1rem 0;
}


/* ============================================================
   63. REDUCED MOTION
   ============================================================ */

@media (prefers-reduced-motion: reduce) {

    *,
    *::before,
    *::after {

        transition:
            none !important;

        animation:
            none !important;
    }
}


/* ============================================================
   64. MOBILE
   ============================================================ */

@media (max-width: 767.98px) {

    .card {

        box-shadow:
            0 2px 7px rgba(50,35,20,.12) !important;
    }

    .main-header {

        box-shadow:
            0 2px 5px rgba(50,35,20,.12) !important;
    }

    .btn {

        box-shadow:
            0 2px 0 rgba(75,55,30,.22);
    }

}
</style>
