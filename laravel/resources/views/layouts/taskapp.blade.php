<html>
<head>
<title>@yield('title')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
body {font-size:16pt; color:#999; margin: 5px; }
h1 { font-size:50pt; text-align:right; color: #f6f6f6;
    margin: -20px 0px -30px 0px; letter-spacing:-4pt; }
ul { font-size:12pt; }
hr { margin: 25px 100px; border-top: 1px dashed #ddd; }
.menutitle {font-size:14pt; font-weight:bold; margin: 0px; }
table { margin-bottom:10px; }
th {background-color:#999; color:#fff; padding:5px 10px; text-align:center; }
td {border: solid 1px #aaa; color:#999; padding:5px 10px; }
.content {margin:10px; }
.footer { text-align:right; font-size:10pt; margin:10px; border-bottom:solid 1px #ccc; color:#ccc; }
</style>
</head>
<body>
    
    <h1>@yield('title')</h1>
    @section('menubar')
    <h2 class="menutitle">※メニュー</h2>
    <ul>
        <li>@show</li>
    </ul>
    <hr size="1">
    <div class="content">
        @yield('content')
    </div>

    <div class="footer">
        @yield('footer')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @yield('script')
    
</body>
</html>