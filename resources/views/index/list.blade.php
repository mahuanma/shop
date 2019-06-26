
    @extends('layout.index')
    @section('content')
    <!-- slider -->
    <div class="slider">
        
        <ul class="slides">
            <li>
                <img src="img/slide1.jpg" alt="">
                <div class="caption slider-content  center-align">
                    <h2>WELCOME TO MSTORE</h2>
                    <h4>Lorem ipsum dolor sit amet.</h4>
                    <a href="" class="btn button-default">SHOP NOW</a>
                </div>
            </li>
            <li>
                <img src="img/slide2.jpg" alt="">
                <div class="caption slider-content center-align">
                    <h2>JACKETS BUSINESS</h2>
                    <h4>Lorem ipsum dolor sit amet.</h4>
                    <a href="" class="btn button-default">SHOP NOW</a>
                </div>
            </li>
            <li>
                <img src="img/slide3.jpg" alt="">
                <div class="caption slider-content center-align">
                    <h2>FASHION SHOP</h2>
                    <h4>Lorem ipsum dolor sit amet.</h4>
                    <a href="" class="btn button-default">SHOP NOW</a>
                </div>
            </li>
        </ul>

    </div>
    <!-- end slider -->

    <!-- features -->
    <div class="features section">
        <div class="container">
            <div class="row">
                <div class="col s6">
                    <div class="content">
                        <div class="icon">
                            <i class="fa fa-car"></i>
                        </div>
                        <h6>免费送货</h6>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                    </div>
                </div>
                <div class="col s6">
                    <div class="content">
                        <div class="icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <h6>退货</h6>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom-0">
                <div class="col s6">
                    <div class="content">
                        <div class="icon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <h6>安全支付</h6>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                    </div>
                </div>
                <div class="col s6">
                    <div class="content">
                        <div class="icon">
                            <i class="fa fa-support"></i>
                        </div>
                        <h6>24/7 全天候支持</h6>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end features -->
    <!-- 搜素 -->
    
<span id="times"></span>
    <!-- quote -->
   
    <!-- end quote -->

    <!-- product -->
    <div class="section product">
        <div class="container">
            <div class="section-head">
                <h4>最新</h4>
                <div class="divider-top"></div>
                <div class="divider-bottom"></div>
            </div>
           
            <div class="row">
                @foreach($res as $k=>$v)
            
                <div class="col s6">
                    <div class="content">
                        <img src="{{$v->goods_img}}" alt="">
                        <h6><a href="">{{$v->goods_name}}</a></h6>
                        <div class="price">
                            $20 <span>${{$v->goods_price}}</span>
                        </div>
                        <a href="{{url('index/cart')}}?id={{$v->id}}"><button class="btn button-default">添加购物车</button></a><a href="{{url('/index/wishlist')}}?id={{$v->id}}"><button class="btn button-default">查看详情</button></a>
                    </div>
                </div>
                @endforeach
        </div>
            
    </div>
    <!-- end product -->

    <!-- promo -->
   
    <!-- end promo -->
<div class="pages-head">
                <h3>搜索</h3>
            </div>
            <div class="input-field">
                <form action="" method="post">
                @csrf
                <input type="text" name="file"><button class="btn button-default">搜索</button></form>
            </div>
    <!-- product -->
    <div class="section product">
        <div class="container">
            <div class="section-head">
                <h4>总排行</h4>
                <div class="divider-top"></div>
                <div class="divider-bottom"></div>
            </div>
            <div class="row">
               @foreach($data as $k=>$v)
                <div class="col s6">
                    <div class="content">
                        <img src="{{$v->goods_img}}" alt="">
                        <h6><a href="">{{$v->goods_name}}</a></h6>
                        <div class="price">
                            $ <span>${{$v->goods_price}}</span>
                        </div>
                        <a href="{{url('index/cart')}}?id={{$v->id}}"><button class="btn button-default">添加到购物车</button></a><a href="{{url('/index/wishlist')}}?id={{$v->id}}"><button class="btn button-default">查看详情</button></a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="pagination-product">
                <ul>
                    <li >{{ $data->appends(['file' => $file])->links() }}</li>
                   
                </ul>
            </div>
        </div>
    </div>
    <!-- end product -->
    
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
     @endsection('content')
  
 <script type="text/javascript" src="/jquery-3.3.1.js"></script>
  <!-- 倒计时   -->

<script type="text/javascript">
 // alert($);

      $(function(){


      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      var o = document.getElementById("times");//获取ID
        getTime();//调用函数
        function getTime() {
            //获取一个截止时间  2018/7/13 12:00
            var endDate = new Date('{{$a_time}}');


            endDate = endDate.getTime();//1970-截止时间  从1970年到截止时间有多少毫秒
 
            //获取一个现在的时间
            var nowdate = new Date;
            nowdate = nowdate.getTime(); //现在时间-截止时间  从现在到截止时间有多少毫秒
 
            //获取时间差 把毫秒转换为秒
            var diff = parseInt((endDate - nowdate) / 1000);
 
            h = parseInt(diff / 3600);//获取还有小时
            m = parseInt(diff / 60 % 60);//获取还有分钟
            s = diff % 60;//获取多少秒数
 
            //将时分秒转化为双位数
            h = setNum(h);
            m = setNum(m);
            s = setNum(s);
 
            //输出时分秒
            o.innerHTML = "新订单未支付,还有" + m + "分" + s + "秒";
            setTimeout(getTime, 1000);
 
        }
        //设置函数 把小于10的数字转换为两位数
        function setNum(num) {
            if (num < 10) {
                num = "0" + num;
            }
            return num;
        }
  });
  </script>









