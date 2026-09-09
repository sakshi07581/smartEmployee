<style>/* =========================================================
   AEROGLASS ROSHAN UI
   EXPERIMENTAL AERO / PHYSICAL CONTROL THEME
   ========================================================= */

:root {
    --aero-blue: #1e9be9;
    --aero-blue-dark: #0875bd;
    --aero-blue-deep: #07558e;
    --aero-blue-light: #9cddff;

    --aero-white: rgba(255,255,255,.92);
    --aero-glass: rgba(230,247,255,.45);
    --aero-glass-light: rgba(255,255,255,.60);
    --aero-glass-dark: rgba(160,210,235,.28);

    --aero-border-light: rgba(255,255,255,.95);
    --aero-border-dark: rgba(75,145,185,.45);

    --aero-text: #17435e;
    --aero-muted: #6c8da2;

    --aero-radius: 8px;

    --aero-shadow:
        0 3px 7px rgba(30,70,100,.20),
        0 10px 25px rgba(30,90,125,.13);

    --aero-shadow-small:
        0 2px 5px rgba(30,70,100,.20);

    --aero-inset:
        inset 0 1px 0 rgba(255,255,255,.90),
        inset 0 -1px 0 rgba(80,140,175,.20);
}


/* =========================================================
   DESKTOP / BACKGROUND
   ========================================================= */

body {

    color: var(--aero-text);

    background:

        radial-gradient(
            ellipse at 20% 10%,
            rgba(255,255,255,.90) 0%,
            rgba(255,255,255,0) 35%
        ),

        radial-gradient(
            ellipse at 80% 20%,
            rgba(100,200,255,.35),
            transparent 38%
        ),

        radial-gradient(
            ellipse at 50% 100%,
            rgba(60,160,220,.25),
            transparent 45%
        ),

        linear-gradient(
            135deg,
            #b8e1f4 0%,
            #e5f6ff 45%,
            #abd8ef 100%
        );

    background-attachment: fixed;
}


/* =========================================================
   GLASS SURFACE
   ========================================================= */

.card,
.navbar,
.dropdown-menu,
.modal-content,
.offcanvas,
.toast,
.alert,
.list-group,
.accordion-item {

    background:

        linear-gradient(
            180deg,
            rgba(255,255,255,.62),
            rgba(215,240,252,.38)
        ) !important;

    backdrop-filter:
        blur(20px);

    -webkit-backdrop-filter:
        blur(20px);

    border:
        1px solid var(--aero-border-light) !important;

    box-shadow:
        var(--aero-shadow);
}


/* =========================================================
   CARD = AERO WINDOW
   ========================================================= */

.card {

    border-radius:
        10px !important;

    overflow:
        hidden !important;

    position:
        relative;
}


/* glossy upper edge */

.card::before {

    content: "";

    position: absolute;

    top: 1px;
    left: 5%;
    right: 5%;

    height: 1px;

    background:
        rgba(255,255,255,.95);

    opacity:
        .9;

    pointer-events:
        none;
}


/* =========================================================
   CARD HEADER
   ========================================================= */

.card-header {

    position: relative;

    color:
        #174766 !important;

    background:

        linear-gradient(
            180deg,
            rgba(255,255,255,.72) 0%,
            rgba(218,242,253,.50) 48%,
            rgba(180,220,239,.32) 100%
        ) !important;

    border-bottom:
        1px solid rgba(90,155,190,.30) !important;

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.95),
        inset 0 -1px 0 rgba(255,255,255,.40);

    text-shadow:
        0 1px 1px white;
}


/* =========================================================
   AERO BUTTON
   ========================================================= */

.btn {

    position: relative;

    border-radius:
        7px !important;

    font-weight:
        500;

    color:
        #234f68;

    border:
        1px solid rgba(75,145,185,.45) !important;

    background:

        linear-gradient(
            180deg,
            rgba(255,255,255,.92) 0%,
            rgba(230,247,255,.80) 45%,
            rgba(186,224,242,.70) 100%
        ) !important;

    box-shadow:

        inset 0 1px 0 rgba(255,255,255,1),

        inset 0 -1px 0 rgba(80,140,175,.20),

        0 2px 4px rgba(30,70,100,.18);

    text-shadow:
        0 1px 0 rgba(255,255,255,.9);

    transition:
        all .12s ease;
}


/* top glass reflection */

.btn::before {

    content: "";

    position: absolute;

    top: 1px;
    left: 7%;
    right: 7%;

    height: 45%;

    border-radius:
        6px;

    background:
        linear-gradient(
            180deg,
            rgba(255,255,255,.55),
            rgba(255,255,255,0)
        );

    pointer-events:
        none;
}


/* HOVER */

.btn:hover {

    transform:
        translateY(-1px);

    color:
        #124b6d;

    background:

        linear-gradient(
            180deg,
            rgba(255,255,255,.98),
            rgba(205,239,255,.88),
            rgba(163,215,240,.78)
        ) !important;

    border-color:
        rgba(35,140,205,.65) !important;

    box-shadow:

        inset 0 1px 0 white,

        0 3px 7px rgba(30,100,145,.25),

        0 0 7px rgba(80,190,240,.20);
}


/* CLICK = PHYSICAL PUSH */

.btn:active {

    transform:
        translateY(1px);

    box-shadow:

        inset 0 2px 5px rgba(30,80,110,.28),

        inset 0 1px 0 rgba(50,110,145,.25);

    transition:
        none;
}


/* =========================================================
   BLUE AERO BUTTON
   ========================================================= */

.btn-primary {

    color:
        white !important;

    border:
        1px solid #0865a3 !important;

    background:

        linear-gradient(
            180deg,
            #8cddff 0%,
            #43b9ef 25%,
            #1590d1 58%,
            #0870b3 100%
        ) !important;

    box-shadow:

        inset 0 1px 0 rgba(255,255,255,.85),

        inset 0 -1px 0 rgba(0,60,100,.30),

        0 2px 5px rgba(0,70,115,.30);

    text-shadow:
        0 1px 2px rgba(0,50,80,.55);
}


.btn-primary:hover {

    background:

        linear-gradient(
            180deg,
            #b1eaff,
            #65c9f6 30%,
            #1596da 65%,
            #0875b8
        ) !important;

    box-shadow:

        inset 0 1px 0 white,

        0 4px 10px rgba(0,100,160,.35),

        0 0 8px rgba(80,200,255,.35);
}


.btn-primary:active {

    background:

        linear-gradient(
            180deg,
            #0870b3,
            #1590d1
        ) !important;

    box-shadow:

        inset 0 2px 5px rgba(0,50,80,.40);
}


/* =========================================================
   GREEN / SUCCESS
   ========================================================= */

.btn-success {

    color:
        white !important;

    border-color:
        #348b48 !important;

    background:

        linear-gradient(
            180deg,
            #a9efb8,
            #59c86f 30%,
            #38a950 65%,
            #25843a
        ) !important;

    box-shadow:

        inset 0 1px 0 rgba(255,255,255,.85),
        inset 0 -1px 0 rgba(30,100,40,.30),
        0 2px 5px rgba(30,100,40,.25);
}


/* =========================================================
   RED / DANGER
   ========================================================= */

.btn-danger {

    color:
        white !important;

    border-color:
        #a63b3b !important;

    background:

        linear-gradient(
            180deg,
            #ffb4b4,
            #ef6f6f 30%,
            #d84b4b 65%,
            #ad3030
        ) !important;

    box-shadow:

        inset 0 1px 0 rgba(255,255,255,.85),
        inset 0 -1px 0 rgba(100,20,20,.30),
        0 2px 5px rgba(100,30,30,.25);
}


/* =========================================================
   WARNING
   ========================================================= */

.btn-warning {

    color:
        #674500 !important;

    border-color:
        #c99c38 !important;

    background:

        linear-gradient(
            180deg,
            #fff4a8,
            #f7d866 35%,
            #e5ba35 70%,
            #c99c28
        ) !important;

    box-shadow:

        inset 0 1px 0 white,
        0 2px 5px rgba(100,80,20,.20);
}


/* =========================================================
   FORM CONTROLS = GLASS + INSET
   ========================================================= */

.form-control,
.form-select,
.input-group-text {

    color:
        var(--aero-text) !important;

    background:

        linear-gradient(
            180deg,
            rgba(255,255,255,.70),
            rgba(220,242,252,.40)
        ) !important;

    border:
        1px solid rgba(75,145,185,.40) !important;

    border-radius:
        6px !important;

    box-shadow:

        inset 0 2px 4px rgba(40,90,120,.10),

        inset 0 1px 0 rgba(255,255,255,.90);
}


.form-control:focus,
.form-select:focus {

    background:
        rgba(255,255,255,.78) !important;

    border-color:
        #36a9e5 !important;

    box-shadow:

        inset 0 2px 4px rgba(40,90,120,.08),

        0 0 0 2px rgba(70,180,235,.20),

        0 0 8px rgba(60,180,235,.18);
}


/* =========================================================
   TABLE = AERO DATA GRID
   ========================================================= */

.table {

    --bs-table-bg:
        transparent !important;

    color:
        var(--aero-text) !important;
}


.table thead th {

    color:
        #194b67 !important;

    background:

        linear-gradient(
            180deg,
            rgba(255,255,255,.75),
            rgba(190,225,241,.42)
        ) !important;

    border-bottom:
        1px solid rgba(70,140,180,.35) !important;

    box-shadow:
        inset 0 1px 0 white;
}


.table tbody td {

    background:
        rgba(255,255,255,.18) !important;

    border-color:
        rgba(255,255,255,.48) !important;
}


.table-hover tbody tr:hover td {

    background:
        rgba(130,215,250,.20) !important;

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.45);
}


/* =========================================================
   DROPDOWN = GLASS MENU
   ========================================================= */

.dropdown-menu {

    padding:
        5px !important;

    border-radius:
        8px !important;

    background:

        linear-gradient(
            180deg,
            rgba(250,253,255,.88),
            rgba(215,240,251,.70)
        ) !important;

    box-shadow:

        inset 0 1px 0 white,

        0 8px 20px rgba(30,80,110,.22),

        0 2px 5px rgba(30,80,110,.15);
}


.dropdown-item {

    color:
        #24526b !important;

    border-radius:
        5px;

    padding:
        7px 10px;
}


.dropdown-item:hover,
.dropdown-item:focus {

    color:
        #084f78 !important;

    background:

        linear-gradient(
            180deg,
            rgba(170,230,255,.60),
            rgba(90,185,230,.30)
        ) !important;

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.75);
}


/* =========================================================
   PAGINATION = PHYSICAL BUTTONS
   ========================================================= */

.page-link {

    color:
        #28556d !important;

    background:

        linear-gradient(
            180deg,
            rgba(255,255,255,.75),
            rgba(205,233,247,.55)
        ) !important;

    border:
        1px solid rgba(75,145,185,.35) !important;

    box-shadow:
        inset 0 1px 0 white;
}


.page-link:hover {

    background:
        rgba(255,255,255,.90) !important;

    box-shadow:
        inset 0 1px 0 white,
        0 2px 5px rgba(30,100,140,.15);
}


.page-item.active .page-link {

    color:
        white !important;

    background:

        linear-gradient(
            180deg,
            #68cdf8,
            #168ed2 55%,
            #0870b2
        ) !important;

    border-color:
        #0870b2 !important;

    box-shadow:

        inset 0 1px 0 rgba(255,255,255,.70),

        inset 0 -1px 0 rgba(0,60,100,.35);
}


/* =========================================================
   BADGES
   ========================================================= */

.badge {

    border:
        1px solid rgba(255,255,255,.65);

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.55),
        0 1px 3px rgba(30,70,100,.15);

    text-shadow:
        0 1px 1px rgba(0,0,0,.18);
}


/* =========================================================
   ALERT
   ========================================================= */

.alert {

    box-shadow:

        inset 0 1px 0 rgba(255,255,255,.75),

        0 3px 8px rgba(30,80,110,.12);
}


/* =========================================================
   NAV TABS
   ========================================================= */

.nav-tabs {

    border-bottom:
        1px solid rgba(75,145,185,.35);
}


.nav-tabs .nav-link {

    color:
        #3c667d !important;

    border:
        1px solid transparent !important;

    border-radius:
        7px 7px 0 0 !important;
}


.nav-tabs .nav-link:hover {

    background:
        rgba(255,255,255,.40) !important;

    border-color:
        rgba(255,255,255,.60) !important;
}


.nav-tabs .nav-link.active {

    color:
        #126fa5 !important;

    background:
        rgba(255,255,255,.62) !important;

    border:
        1px solid rgba(255,255,255,.85) !important;

    border-bottom-color:
        transparent !important;

    box-shadow:
        inset 0 1px 0 white;
}


/* =========================================================
   ACCORDION
   ========================================================= */

.accordion-item {

    border-radius:
        7px !important;

    overflow:
        hidden;
}


.accordion-button {

    color:
        #24536b !important;

    background:

        linear-gradient(
            180deg,
            rgba(255,255,255,.70),
            rgba(205,235,249,.45)
        ) !important;

    box-shadow:
        inset 0 1px 0 white !important;
}


.accordion-button:not(.collapsed) {

    color:
        #086fa8 !important;

    background:
        rgba(255,255,255,.60) !important;
}


/* =========================================================
   CHECKBOX
   ========================================================= */

.form-check-input {

    background-color:
        rgba(255,255,255,.65) !important;

    border:
        1px solid rgba(65,130,165,.50) !important;

    box-shadow:
        inset 0 1px 3px rgba(30,70,100,.15);
}


.form-check-input:checked {

    background-color:
        #168bd0 !important;

    border-color:
        #086da9 !important;

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.55),
        0 1px 4px rgba(20,100,150,.25);
}


/* =========================================================
   MODAL
   ========================================================= */

.modal-content {

    border-radius:
        10px !important;

    background:

        linear-gradient(
            180deg,
            rgba(245,252,255,.82),
            rgba(205,234,248,.70)
        ) !important;

    box-shadow:

        inset 0 1px 0 white,

        0 20px 60px rgba(20,70,100,.30);
}


.modal-header {

    background:

        linear-gradient(
            180deg,
            rgba(255,255,255,.70),
            rgba(210,238,250,.35)
        );

    border-bottom:
        1px solid rgba(70,140,180,.30);
}


/* =========================================================
   PROGRESS
   ========================================================= */

.progress {

    background:
        rgba(120,180,210,.22) !important;

    border:
        1px solid rgba(70,130,160,.30);

    box-shadow:
        inset 0 2px 4px rgba(30,70,100,.12);
}


.progress-bar {

    background:

        linear-gradient(
            180deg,
            #82d9ff,
            #1b9bdc 50%,
            #0872b4
        ) !important;

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.65);
}


/* =========================================================
   GLOBAL FOCUS
   ========================================================= */

:focus-visible {

    outline:
        2px solid rgba(25,145,210,.65);

    outline-offset:
        2px;
}


/* =========================================================
   GLASS UTILITY
   ========================================================= */

.aero-glass {

    background:

        linear-gradient(
            135deg,
            rgba(255,255,255,.62),
            rgba(210,240,252,.32)
        );

    backdrop-filter:
        blur(18px);

    border:
        1px solid rgba(255,255,255,.80);

    box-shadow:
        var(--aero-shadow);
}


/* =========================================================
   PHYSICAL CONTROL
   ========================================================= */

.aero-control {

    border:
        1px solid rgba(70,135,170,.45);

    background:

        linear-gradient(
            180deg,
            rgba(255,255,255,.90),
            rgba(190,225,240,.65)
        );

    box-shadow:

        inset 0 1px 0 white,
        inset 0 -1px 0 rgba(60,120,150,.20),

        0 2px 4px rgba(30,70,100,.18);

    border-radius:
        7px;

    transition:
        all .12s ease;
}


.aero-control:hover {

    box-shadow:

        inset 0 1px 0 white,

        0 3px 7px rgba(30,90,125,.25),

        0 0 8px rgba(60,180,230,.18);
}


.aero-control:active {

    transform:
        translateY(1px);

    box-shadow:

        inset 0 2px 5px rgba(30,80,110,.25);
}</style>
