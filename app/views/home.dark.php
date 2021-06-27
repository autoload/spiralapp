<extends:layout.base title="[[Welcome To Spiral]]"/>
<use:element path="embed/links" as="homepage:links"/>

<stack:push name="styles">
    <link rel="stylesheet" href="/styles/welcome.css"/>
</stack:push>

<define:body>
    <div class="container">
        <div class="wrapper">
            <img src="/images/logo.svg" alt="Spiral Logo" height="100px"/>
            <img src="/images/php8_200.jpg" alt="PHP8 Logo" height="100px"/>
            <img src="/images/docker_200.jpg" alt="Docker Logo" height="100px"/>
            <img src="/images/aws_200.png" alt="AWS Logo" height="100px"/>
            <div id="result_mk"></div>
        </div>
    </div>



<script src="/js/showdown.min.js"></script> 
<script>  
    window.onload = function () {
        //获取要转换的文字
        var text = {{$md}};
        //创建实例
        var converter = new showdown.Converter();
        //进行转换
        var html = converter.makeHtml(text);
        //展示到对应的地方  result便是id名称
     document.getElementById("result_mk").innerHTML = html;
    }
</script>  


</define:body>
