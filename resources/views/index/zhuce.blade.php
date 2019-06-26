


<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <title>Mstore - Online Shop Mobile Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">

    <link rel="stylesheet" href="/mstore/css/materialize.css">
    <link rel="stylesheet" href="/mstore/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/mstore/css/normalize.css">
    <link rel="stylesheet" href="/mstore/css/owl.carousel.css">
    <link rel="stylesheet" href="/mstore/css/owl.theme.css">
    <link rel="stylesheet" href="/mstore/css/owl.transitions.css">
    <link rel="stylesheet" href="/mstore/css/fakeLoader.css">
    <link rel="stylesheet" href="/mstore/css/animate.css">
    <link rel="stylesheet" href="/mstore/css/style.css">
    
    <link rel="shortcut icon" href="img/favicon.png">

</head>
<body>

    <!-- navbar top -->
    <div class="navbar-top">
        <!-- site brand  -->
        <div class="site-brand">
            <a href="index.html"><h1>Mstore</h1></a>
        </div>
        <!-- end site brand  -->
        <div class="side-nav-panel-right">
            <a href="#" data-activates="slide-out-right" class="side-nav-left"><i class="fa fa-user"></i></a>
        </div>
    </div>
    <!-- end navbar top -->

    <!-- side nav right-->
    <div class="side-nav-panel-right">
        <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
            <li class="profil">
                <img src="img/profile.jpg" alt="">
                <h2>John Doe</h2>
            </li>
            <li><a href="setting.html"><i class="fa fa-cog"></i>Settings</a></li>
            <li><a href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
            <li><a href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
            <li><a href="login.html"><i class="fa fa-sign-in"></i>Login</a></li>
            <li><a href="register.html"><i class="fa fa-user-plus"></i>Register</a></li>
        </ul>
    </div>
    <!-- end side nav right-->

    <!-- navbar bottom -->
    <div class="navbar-bottom">
        <div class="row">
            <div class="col s2">
                <a href="index.html"><i class="fa fa-home"></i></a>
            </div>
            <div class="col s2">
                <a href="wishlist.html"><i class="fa fa-heart"></i></a>
            </div>
            <div class="col s4">
                <div class="bar-center">
                    <a href="#animatedModal" id="cart-menu"><i class="fa fa-shopping-basket"></i></a>
                    <span>2</span>
                </div>
            </div>
            <div class="col s2">
                <a href="contact.html"><i class="fa fa-envelope-o"></i></a>
            </div>
            <div class="col s2">
                <a href="#animatedModal2" id="nav-menu"><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </div>
    <!-- end navbar bottom -->

    <!-- menu -->
    
    
    <!-- login -->
    <form action="{{url('index/dozhuce')}}" method="post">
       @csrf
       <a href="login"><h7>立即登录→</h7></a>
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>注册页面</h3>
            </div>

            <div class="login">
                <div class="row">
                    <form class="col s12">
                        <div class="input-field">
                            <input type="text" class="validate" placeholder="请输入账号" name="name" required>
                        </div>
                        <div class="input-field">
                            <input type="password" class="validate" placeholder="请输入密码" name="pwd" required>
                        </div>
                       
                        <button class="btn button-default">快速注册</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- end login -->
    
    <!-- loader -->
    <div id="fakeLoader"></div>
    <!-- end loader -->
    
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="about-us-foot">
                <h6>Mstore</h6>
                <p>is a lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit.</p>
            </div>
            <div class="social-media">
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-google"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
                <a href=""><i class="fa fa-instagram"></i></a>
            </div>
            <div class="copyright">
                <span>© 2017 All Right Reserved</span>
            </div>
        </div>
    </div>
    <!-- end footer -->
    
    <!-- scripts -->
    <script src="/mstore/js/jquery.min.js"></script>
    <script src="/mstore/js/materialize.min.js"></script>
    <script src="/mstore/js/owl.carousel.min.js"></script>
    <script src="/mstore/js/fakeLoader.min.js"></script>
    <script src="/mstore/js/animatedModal.min.js"></script>
    <script src="/mstore/js/main.js"></script>

</body>
</html>


















