<html>
<head>
    <style>
        html{
            min-height: 100%;
            width: 100%;
            height: 539px;
            font-family: "Microsoft YaHei", "arial";
        }
        body{
            margin: 0;
            padding: 0;
        }
        .bg{
            position: relative;
        }
        .bg>img{
            height: 100%;
            width: 100%
        }
        .word{
            position: absolute;
            top:0;
            text-align: center;
            width: 100%;
            margin-top: 15%;
            min-width: 650px;
        }
        .word > img {
            transform: scale(0.8);
        }
        .word img{
            display: inline-block;
        }
        .word>div{
            top: -117px;
            display: inline-block;
            position: relative;
            margin-left: 80px;
        }
        .word .chinese{
            font-size: 26px;
            color: #7ecef4;
        }
        .word .english{
            font-size: 14px;
            color: #7ecef4;
            margin-top: 10px;
            margin-left: -15px;
        }
        .word a{
            font-size: 14px;
            color: #7ecef4;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #7ecef4;
            border-radius: 4px;
            margin-top: 20px;
            position: relative;
            float: right;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="bg">
    <img src="/assets/theme_1/pc/resource/image/404bg.png" alt="">
    <div class="word">
        <img src="/assets/theme_1/pc/resource/image/404img.png" alt="">
        <div>
            <div class="chinese">您所访问的页面不存在～</div>
            <div class="english">The page you are visiting does not exist.</div>
            <a href="/">返回首页</a>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">

</script>
</html>