<?php  
session_start();
?>
<!doctype html>
<html lang="en"><head>
        
        <meta charset="utf-8" />
        <title>Sistem Informasi Pemetaan Titik Tower</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="dist/leaflet.css" />
		<script type="text/javascript" src="dist/leaflet.js"></script>
        <script type="text/javascript" src="js/app.js"></script>

    </head>
    
    <style>
    body[data-layout="horizontal"][data-topbar="colored"] #page-topbar {
    background-color: #c11414;
    -webkit-box-shadow: none;
    box-shadow: none;
}
body[data-layout="horizontal"] .page-content {
    margin-top: 45px;
    padding: calc(80px + 20px) calc(20px / 2) 60px calc(20px / 2);
}
.topnav {
    background: #950808;
    padding: 0 calc(20px / 2);
    -webkit-box-shadow: 0 2px 4px rgba(15,34,58,.12);
    box-shadow: 0 2px 4px rgba(15,34,58,.12);
    left: 0;
    right: 0;
    z-index: 100;
}
		.topnav .navbar-nav .nav-link {
    font-size: 14.5px;
    position: relative;
    padding: 1rem 1.3rem;
    color: #fff;
    font-weight: bolder;
}
		#map {
		    width: 464px;
            height: 400px;
        }
        .form-control {
        font-weight: 300;
        border-color: #466cff;
        background:#e6f2ff;

        }
        .leaflet-container .leaflet-control-search {
	position:relative;
	float:left;
	background:#fff;
	color:#1978cf;
	border: 2px solid rgba(0,0,0,0.2);
	background-clip: padding-box;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	background-color: rgba(255, 255, 255, 0.8);
	z-index:1000;	
	margin-left: 10px;
	margin-top: 10px;
}
.leaflet-control-search.search-exp {/*expanded*/
	background: #fff;
	border: 2px solid rgba(0,0,0,0.2);
    background-clip: padding-box;	
    width: 300px;
}
.leaflet-control-search .search-input {
	display:block;
	float:left;
	background: #fff;
	border:1px solid #666;
	border-radius:2px;
	height:22px;
	padding:0 20px 0 2px;
    margin:4px 0 4px 4px;
    width: 261px;
}
.leaflet-control-search.search-load .search-input {
	background: url('images/loader.gif') no-repeat center right #fff;
}
.leaflet-control-search.search-load .search-cancel {
	visibility:hidden;
}
.leaflet-control-search .search-cancel {
	display:block;
	width:22px;
	height:22px;
	position:absolute;
	right:28px;
	margin:6px 0;
	background: url('images/search-icon.png') no-repeat 0 -46px;
	text-decoration:none;
	filter: alpha(opacity=80);
	opacity: 0.8;		
}
.leaflet-control-search .search-cancel:hover {
	filter: alpha(opacity=100);
	opacity: 1;
}
.leaflet-control-search .search-cancel span {
	display:none;/* comment for cancel button imageless */
	font-size:18px;
	line-height:20px;
	color:#ccc;
	font-weight:bold;
}
.leaflet-control-search .search-cancel:hover span {
	color:#aaa;
}
.leaflet-control-search .search-button {
	display:block;
	float:left;
	width:30px;
	height:30px;	
	background: url('images/search-icon.png') no-repeat 4px 4px #fff;
	border-radius:4px;
}
.leaflet-control-search .search-button:hover {
	background: url('images/search-icon.png') no-repeat 4px -20px #fafafa;
}
.leaflet-control-search .search-tooltip {
	position:absolute;
	top:100%;
	left:0;
	float:left;
	list-style: none;
	padding-left: 0;
	max-height: 122px;
box-shadow: 1px 1px 6px rgba(227, 227, 227, 0.4);
background-color: rgb(255, 255, 255);
z-index: 1010;
overflow-y: auto;
overflow-x: hidden;
cursor: pointer;
width: 300px;
}
.leaflet-control-search .search-tip {
	margin:2px;
	padding:2px 4px;
	display:block;
	color:black;
	background: #eee;
	border-radius:.25em;
	text-decoration:none;	
	white-space:nowrap;
	vertical-align:center;
}
.leaflet-control-search .search-button:hover {
	background-color: #f4f4f4;
}
.leaflet-control-search .search-tip-select,
.leaflet-control-search .search-tip:hover {
	background-color: #fff;
}
.leaflet-control-search .search-alert {
	cursor:pointer;
	clear:both;
	font-size:.75em;
	margin-bottom:5px;
	padding:0 .25em;
	color:#e00;
	font-weight:bold;
	border-radius:.25em;
}

    </style>
 

    <body data-layout="horizontal" data-topbar="colored" onload="peta_awal()">

        <!-- Begin page -->
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="20">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="55">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="55">
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="topnav">

                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
    
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                               <?php include "menu.php";?>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <?php include "content.php";?>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- container-fluid -->
                </div>
            </div>
        </div>
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/pages/datatables.init.js"></script>

    </body>
	</html>
