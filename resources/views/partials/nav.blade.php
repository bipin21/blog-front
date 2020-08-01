<!-- HEADER -->
<div style="position: relative;">
    <div class="header">
        <div class="menu_all" id="myHeader">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="logo">
                            <a href="home.html">
                                <div class="logo_img">
                                    <img src="{{asset('/images/logo.png')}}"  alt="image">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-8 col-md-8 col-lg-8">
                        <div class="menu_right d-flex">
                            <div class="menu_right_list">
                                <ul class="menu_right_ul d-flex">
                                    <li class="dis_fx_cntr">
                                        <a href="/">HOME</a>
                                    </li>
                                    <?php
                                    // print_r($cat);
                                    // die();
                                    ?>
                                    @if(count($cat) > 0)
                                        @foreach($cat as $c)
                                        <li class="dis_fx_cntr">
                                        <a href="/category/{{$c->categoryName}}/{{$c->id}}">{{$c->categoryName}}</a>
                                    </li>
                                        @endforeach
                                        @endif
                                    <li>
                                        <a href="/">about</a>
                                    </li>

                                    <li>
                                        <a href="/">CONTACT</a>
                                    </li>
                                </ul>
                            </div>
                            <search></search>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADER -->