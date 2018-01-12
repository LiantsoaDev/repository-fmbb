@include('frontjers.header')

 
    

    <!-- Content
    ================================================== -->
    <div class="site-content">
      <div class="container">

        <div class="row">

          <!-- Content -->
          <div class="content col-md-8">

            <!-- Article -->
            <article class="card card--lg post post--single">

              
                                                <!-- Product #1 -->
                                        <li class="product__item product__item--color-1 card">

                                <div class="product__img">
                                <div class="product__img-holder">
                                    <div class="product__bg-letters">SK</div>

                                        <div class="product__slider">
                                            @foreach(explode('|',$images->urlimage) as $image)
                                            <div class="product__slide">
                                                <div class="product__slide-img">
                                                    <img src="../../../app/photos/{{$image}}" alt="">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="product__content card__content">

                                <header class="product__header">
                                    <div class="product__header-inner">
                                    <span class="product__category">Sneakers</span>
                                    <h2 class="product__title"><a href="shop-product.html">{{$article->titre}}</a></h2>
                                    <div class="product__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star empty"></i>
                                    </div>
                                    </div>
                                    <div class="product__price">le {{$article->created_at->format('j M, Y')}}</div>
                                </header>

                                <div class="product__excerpt">
                                    <h6>Description</h6>
                                    {{$article->contenu}}
                                </div>

                               

                                <footer class="product__footer">
                                    <a href="shop-cart.html" class="btn btn-primary btn-icon product__add-to-cart"><i class="icon-bag"></i> Add to Cart</a>
                                    <a href="#" class="btn btn-default btn-single-icon product__wish"><i class="icon-heart"></i></a>
                                </footer>
                                </div>
                                </li>
                                <!-- Product #1 / End -->




            </article>
            <!-- Article / End -->

          </div>
          <!-- Content / End -->

          <!-- Player Sidebar -->
          <div class="sidebar sidebar--player col-md-4">

            <!-- Widget: Player Newslog -->
            <aside class="widget card widget--sidebar widget-newslog">
              <div class="widget__title card__header">
                <h4>Articles à voir</h4>
              </div>
              <div class="widget__content card__content">
              
              <ul class="newslog">
                
              @foreach($artout->slice(0, 4) as $art)
               <a href="{{ route('articles',$art->id) }}">
                    <li class="newslog__item newslog__item--injury">
                    <figure class="posts__thumb">
                        <a href="{{ route('articles',$art->id) }}"><img src="../../app/photos/{{$art->urlimage}}" style="height:50px;width:100px;" alt=""></a>
                    </figure>
                    <div class="newslog__item-inner">
                      <div class="newslog__content"><strong>{{$art->titre}} :</strong> {{str_limit($art->contenu, $limit = 35, $end = '...')}}<strong></strong>. </div>
                      <time class="newslog__date" datetime="2016-01-19">January 19, 2016</time>
                    </div>
                  </li>

                    </li>
                    </a>
              @endforeach                  
                </ul>

              </div>
            </aside>
            <!-- Widget: Player Newslog / End -->
            

            <!-- Widget: Newsletter -->
            <aside class="widget widget--sidebar card widget-newsletter">
              <div class="widget__title card__header">
                <h4>Our Newsletter</h4>
              </div>
              <div class="widget__content card__content">
                <h5 class="widget-newsletter__subtitle">Subscribe Now!</h5>
                <div class="widget-newsletter__desc">
                  <p>Receive the latest news from the team: game reminders, new adquisitions and professional match results.</p>
                </div>
                <form action="#" id="newsletter" class="inline-form">
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Your email address...">
                    <span class="input-group-btn">
                      <button class="btn btn-lg btn-default" type="button">Send</button>
                    </span>
                  </div>
                </form>
              </div>
            </aside>
            <!-- Widget: Newsletter / End -->
            

          </div>
          <!-- Player Sidebar / End -->
        </div>

      </div>
    </div>

    <!-- Content / End -->

@include('frontjers.footer')