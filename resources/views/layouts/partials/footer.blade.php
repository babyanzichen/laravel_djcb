<div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
        <div class="ui stackable inverted divided grid">
            <div class="four wide column">
                <h4 class="ui inverted header">友链</h4>
                <div class="ui inverted link list">
                    @foreach($linkList as $v)
                        <a href="{{ $v->link }}" class="item no_marakdown" target="_blank">{{ $v->title }}</a>
                    @endforeach
                </div>
            </div>
            <div class="four wide column">
                <h4 class="ui inverted header">资源推荐</h4>
                <div class="ui inverted link list">
                    @foreach($recommendList as $v)
                        <a href="{{ $v->link }}" class="item no_marakdown" target="_blank">{{ $v->title }}</a>
                    @endforeach
                </div>
            </div>
            <div class="eight wide column">
                <h4 class="ui inverted  header">点金车宝</h4>
                <p>
                    1.中国武汉国际汽车升级及改装博览会
                </p>
                <p>
                    2.汽车生活、车模趣谈、汽车漂移
                </p>
            </div>
        </div>

        <div class="ui inverted section divider"></div>
        <div>

            <p style="font-size:0.9em; margin-top:20px;margin-bottom: -8px;color: rgb(137, 137, 140);"
               class="ui inverted ">
                © 2017 Powered by <a href=""
                                     target="_blank" style="color: inherit;">点金国际传媒</a>
                <span style="color: #e27575;font-size: 14px;">❤</span>
            </p>
        </div>
    </div>
</div>