@include('frontjers.header')
    <!-- Header Featured News================================================== -->
    <div class="posts posts--carousel-featured featured-carousel">

 <!-- ================================================DEBUT PUB 1================================================ -->                      
    @foreach($pub1url as $url)
      <div class="posts__item posts__item--category-1">
        <a href="" class="posts__link-wrapper">
          <figure class="posts__thumb">
      
            <img src="../app/photos/{{$url->url}}" style="height:280px" alt="">

          </figure>
        
        </a>
      </div>
    @endforeach

      @foreach($pub1url as $url)
      <div class="posts__item posts__item--category-1">
        <a href="#" class="posts__link-wrapper">
          <figure class="posts__thumb">
      
            <img src="../app/photos/{{$url->url}}" style="height:280px" alt="">

          </figure>
        
        </a>
      </div>
      @endforeach

    </div>
 <!-- ================================================FIN PUB 1================================================ -->                 

    <!-- Content
    ================================================== -->
    <div class="site-content">
      <div class="container">

        <div class="row">
          <!-- Content -->
          <div class="content col-md-8">

            <!-- Featured News -->
            <div class="card card--clean">
              <header class="card__header card__header--has-filter">
                <h4>Nouvelles</h4>
                
              </header>
              <div class="card__content">

 <!-- ================================================DEBUT DU SLIDE 4 derniers articles================================================ -->                 
                <div class="slick posts posts--slider-featured">
@if(count($slt) != 0)
@foreach($slt as $slts)
                  <div class="posts__item posts__item--category-1">
                    
                      <figure class="posts__thumb">
                      <a href="{{ route('articles',$slts->id) }}"> 
                        <img src="../app/photos/{{$slts->urlimage}}" style="height:500px;width:800px;" alt=""><!-- class="posts__link-wrapper" -->
</a>
                      </figure>
                      
                      
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label"></span>
                        </div>
                        <h3 class="posts__title"> <a href="{{ route('articles',$slts->id) }}"> <span class="posts__title-higlight">{{str_limit($slts->titre, $limit = 20, $end = '...')}}</span></a></h3>
                        <div class="post-author">
                          <figure class="post-author__avatar">
                            
                          </figure>
                          <div class="post-author__info">
                            <h4 class="post-author__name"></h4>
                            <time datetime="2017-08-28" class="posts__date"></time>
                          </div>
                        </div>
                      </div>
                      
                    
                  </div>
@endforeach
@foreach($slt as $slts)
                  <div class="posts__item posts__item--category-1">
                    
                      <figure class="posts__thumb">
                      <a href="{{ route('articles',$slts->id) }}">
                        <img src="../app/photos/{{$slts->urlimage}}" style="height:500px;width:800px;" alt="">
</a>
                      </figure>
                      
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span class="label posts__cat-label"></span>
                        </div>
                        <h3 class="posts__title"> <a href="{{ route('articles',$slts->id) }}"> <span class="posts__title-higlight" >{{str_limit($slts->titre, $limit = 20, $end = '...')}}</span></a></h3>
                        <div class="post-author">
                          <figure class="post-author__avatar">
                            
                          </figure>
                          <div class="post-author__info">
                            <h4 class="post-author__name"></h4>
                            <time datetime="2017-08-28" class="posts__date"></time>
                          </div>
                        </div>
                      </div>
                      
                    
                  </div>
@endforeach
@else
@endif
 <!-- ================================================FIN DU SLIDE 4 derniers articles================================================ -->                 
                </div>
                <!-- Slider / End -->

              </div>
            </div>
            <!-- Featured News / End -->


            <!-- Post Area 1 -->

            <div class="posts posts--cards post-grid row">
 <!-- ================================================LES 4 PREMIERS articles================================================ -->                 
@foreach($article4 as $art4)
            <div class="col-sm-6">
            <div class="posts posts--cards post-grid">
            <a href="{{ route('articles',$art4->id) }}">
              <div class="post-grid__item">
                <div class="posts__item posts__item--card posts__item--category-1 card">
                  <figure class="posts__thumb">
                    <div class="posts__cat">
                      <span class="label posts__cat-label">{{str_limit($art4->categorie, $limit = 15, $end = '...')}}</span>
                    </div>
                    <img src="../app/photos/{{$art4->urlimage}}" style="height:260px;" alt="">
                  </figure>
                  <div class="posts__inner card__content">
                    <a href="#" class="posts__cta"></a>
                    
                    <h6 class="posts__title"><a href="{{ route('articles',$art4->id) }}">{{str_limit($art4->titre, $limit = 20, $end = '...')}}</a></h6>
                    <div class="posts__excerpt">
                    {{str_limit($art4->contenu, $limit = 36, $end = '...')}}
                    </div>
                  </div>
                  <footer class="posts__footer card__footer">
                    <div class="post-author">
                      <figure class="post-author__avatar">

                      </figure>
                      <div class="post-author__info">
                        <h4 class="post-author__name"></h4>
                      </div>
                    </div>
                    <ul class="post__meta meta">
                      <li class="meta__item meta__item--views">2369</li>
                      <li class="meta__item meta__item--likes" data-toggle="modal" data-target=""><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                      <li class="meta__item meta__item--comments" data-toggle="modal" data-target=""><a href="#">18</a></li>
                    </ul>
                  </footer>
                </div>
              </div>
              </a>
            </div>
          </div>
@endforeach
 <!-- ================================================FIN LES 4 PREMIERS articles================================================ -->                 
            </div>
            <!-- Post Area 1 / End -->


         


            <!-- Main News Banner -->
            <div class="main-news-banner main-news-banner--img-left">
              



 <!--============================================ PUB Numero 3 ====================================================-->
 @if(!is_null($pub3))
            <div id="hero-wrapper">
            <div class="carousel-wrapper">
              <div id="hero-carousel" class="carousel slide carousel-fade">
              
              <div class="carousel-inner">
             
                  <div class="item active">
                      <img src="../app/photos/{{$pub3->url}}">
                  </div>

                @for($a=1; $a<count($pub3url); $a++)
                  <div class="item">

                    <img src="../app/photos/{{$pub3url[$a]->url}}">
                  </div>
                @endfor  
                </div>

              </div>
            </div>
          </div>
          @else
@endif
 <!--============================================Fin PUB Numero 3 ====================================================-->




            </div>
            <!-- Main News Banner / End -->


            <!-- Post Area 3 -->
            <div class="posts posts--cards post-grid row">

            </div>
            <!-- Post Area 3 / End -->


            <!-- Lates News -->
            <div class="card card--clean">
              <header class="card__header card__header--has-btn">
                <h4>Articles de l'année</h4>
                <a href="#" class="btn btn-default btn-outline btn-xs card-header__button">Voir toute les articles</a>
              </header>
              <div class="card__content">
                <!-- Posts List -->
                <div class="posts posts--cards posts--cards-thumb-left post-list">
<!--=============================================ARTICLES DE D'ANNEE==================================================-->

@foreach($article as $articles)
<a href="{{ route('articles',$articles->id) }}">
                  <div class="post-list__item">
                    <div class="posts__item posts__item--card posts__item--category-1 card">
                      <figure class="posts__thumb">

                                      
                              <img src="../../app/photos/{{$articles->urlimage}}" style="height:300px" alt="...">
                                      
                      
                      </figure>
                      <div class="posts__inner">
                        <div class="card__content">
                          <div class="posts__cat">
                            <span class="label posts__cat-label">{{str_limit($articles->categorie, $limit = 15, $end = '...')}}</span>
                          </div>
                          <h6 class="posts__title"><a href="{{ route('articles',$articles->id) }}">{{str_limit($articles->titre, $limit = 20, $end = '...')}}</a></h6>
                          <time datetime="2016-08-17" class="posts__date">August 17th, 2016</time>
                          <div class="posts__excerpt">
                              {{str_limit($articles->contenu, $limit = 40, $end = '...')}}
                          </div>
                        </div>
                        <footer class="posts__footer card__footer">
                          <div class="post-author">
                            <figure class="post-author__avatar">
  
                            </figure>
                            <div class="post-author__info">
                              <h4 class="post-author__name"></h4>
                            </div>
                          </div>
                          <ul class="post__meta meta">
                            <li class="meta__item meta__item--views">2369</li>
                            <li class="meta__item meta__item--likes" data-toggle="modal" data-target=""><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                            <li class="meta__item meta__item--comments" data-toggle="modal" data-target=""><a href="#">18</a></li>
                          </ul>
                        </footer>
                      </div>
                    </div>
                  </div>
                  </a>
@endforeach
{{$article->links()}}
<!--=============================================FIN ARTICLES DE D'ANNEE==================================================-->
                </div>
                <!-- Posts List / End -->
              </div>
            </div>
            <!-- Lates News / End -->


          </div>
          <!-- Content / End -->

          <!-- Sidebar -->
          <div id="sidebar" class="sidebar col-md-4">
            <!-- Widget: Standings -->
            <aside class="widget card widget--sidebar widget-standings">
              <div class="widget__title card__header card__header--has-btn">
                <h4>Playoff</h4>
                <a href="#" class="btn btn-default btn-outline btn-xs card-header__button">Tout voir</a>
              </div>
              <div class="widget__content card__content">
                <div class="table-responsive">
                  <table class="table table-hover table-standings">
                    <thead>
                      <tr>
                        <th>Position des équipes</th>
                        <th>W</th>
                        <th>L</th>
                        <th>GB</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="../front/assets/images/samples/logos/pirates_shield.png" alt="">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">ASCB</h6>
                              <span class="team-meta__place"></span>
                            </div>
                          </div>
                        </td>
                        <td>45</td>
                        <td>5</td>
                        <td>0</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="../front/assets/images/samples/logos/sharks_shield.png" alt="">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">COSFA</h6>
                              <span class="team-meta__place"></span>
                            </div>
                          </div>
                        </td>
                        <td>42</td>
                        <td>8</td>
                        <td>3</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="../front/assets/images/samples/logos/alchemists_b_shield.png" alt="">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">ASCUT</h6>
                              <span class="team-meta__place"></span>
                            </div>
                          </div>
                        </td>
                        <td>40</td>
                        <td>10</td>
                        <td>5</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="../front/assets/images/samples/logos/ocean_kings_shield.png" alt="">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">CHALENGER</h6>
                              <span class="team-meta__place"></span>
                            </div>
                          </div>
                        </td>
                        <td>38</td>
                        <td>12</td>
                        <td>7</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="../front/assets/images/samples/logos/red_wings_shield.png" alt="">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">FANDREFIALA</h6>
                              <span class="team-meta__place"></span>
                            </div>
                          </div>
                        </td>
                        <td>37</td>
                        <td>13</td>
                        <td>8</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="../front/assets/images/samples/logos/lucky_clovers_shield.png" alt="">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">ASCB</h6>
                              <span class="team-meta__place"></span>
                            </div>
                          </div>
                        </td>
                        <td>34</td>
                        <td>16</td>
                        <td>11</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="../front/assets/images/samples/logos/draconians_shield.png" alt="">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">SBBC</h6>
                              <span class="team-meta__place"></span>
                            </div>
                          </div>
                        </td>
                        <td>31</td>
                        <td>19</td>
                        <td>14</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="../front/assets/images/samples/logos/bloody_wave_shield.png" alt="">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">AMBOHOOPS</h6>
                              <span class="team-meta__place"></span>
                            </div>
                          </div>
                        </td>
                        <td>30</td>
                        <td>20</td>
                        <td>15</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </aside>
            <!-- Widget: Standings / End -->
            

            <!-- Widget: Social Buttons -->
            <aside class="widget widget--sidebar widget-social">

              <a href="https://www.facebook.com/madagascarbasketball/" class="btn-social-counter btn-social-counter--fb" target="_blank">
                <div class="btn-social-counter__icon">
                  <i class="fa fa-facebook"></i>
                </div>
                <h6 class="btn-social-counter__title">Notre Page facebook</h6>
                <span class="btn-social-counter__count"><span class="btn-social-counter__count-num"></span> Likes</span>
                <span class="btn-social-counter__add-icon"></span>
              </a>
              <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmadagascarbasketball%2F&tabs=timeline&width=378&height=500&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId=1486609321428645" width="400" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            <!--  <a href="#" class="btn-social-counter btn-social-counter--rss" target="_blank">
                <div class="btn-social-counter__icon">
                  <i class="fa fa-rss"></i>
                </div>
                <h6 class="btn-social-counter__title">Subscribe to Our RSS</h6>
                <span class="btn-social-counter__count"><span class="btn-social-counter__count-num">840</span> Subscribers</span>
                <span class="btn-social-counter__add-icon"></span>
              </a>-->
            </aside>
            <!-- Widget: Social Buttons / End -->
            

            <!-- Widget: Popular News -->
            <aside class="widget widget--sidebar card widget-popular-posts">

              <div class="widget__title card__header">
                <h4>Article du mois</h4>
              </div>


              <div class="widget__content card__content" id="slider-thumbs">
                <ul class="posts posts--simple-list">
                
                                  
                  @foreach($artMois as $art)
                  <a href="{{ route('articles',$art->id) }}">
                  <li class="posts__item posts__item--category-2">
                    <figure class="posts__thumb">
                      <a href="{{ route('articles',$art->id) }}"><img src="../app/photos/{{$art->urlimage}}" style="height:100px;width:120px;" alt=""></a>
                    </figure>
                    <div class="posts__inner">
                      <div class="posts__cat">
                        <span class="label posts__cat-label">{{str_limit($art->titre, $limit = 20, $end = '...')}}</span>
                      </div>
                      <h6 class="posts__title"><a href="{{ route('articles',$art->id) }}">{{str_limit($art->contenu, $limit = 40, $end = '...')}}</a></h6>
                      <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                    </div>
                  </li>
                  </a>
                  @endforeach
          
      
                </ul>
              </div>

            </aside>
            <!-- Widget: Popular News / End -->
            

            <!-- Widget: Featured Player -->
           
            <!-- Widget: Featured Player / End -->
            

            <!-- Widget: Game Result -->
            
            <!-- Widget: Game Result / End -->
            

            <!-- Widget: Trending News -->
            @if(!is_null($pub2))
            <aside class="widget widget--sidebar card widget-tabbed">
              
              <div class="widget__content card__content">
                <div class="widget-tabbed__tabs">
                  <!-- Widget Tabs -->
                  
            
                  <!-- Widget Tab panes -->
                  <div class="tab-content widget-tabbed__tab-content">
                    <!-- Newest -->
                    <div role="tabpanel" class="tab-pane fade in active" id="widget-tabbed-newest">
                      <!--============================== PUB2 ====================================-->

                      <div id="carousel-pager" class="carousel slide " data-ride="carousel" data-interval="9000">
                        <div class="carousel-inner vertical">
                                
                                  <div class="active item">
                                      <img src="../app/photos/{{$pub2->url}}" style="height:300px;width:380px;" class="img-responsive" data-target="#carousel-main" data-slide-to="0">
                                  </div>
                                  
                                  @for($a = 1; $a<count($pub2url); $a++)
                                  <div class="item">
                                      <img src="../app/photos/{{$pub2url[$a]->url}}" style="height:300px;width:380px;" class="img-responsive" data-target="#carousel-main" data-slide-to="{{$a}}">
                                  </div>
                                  @endfor
                              </div>
                              
                              <!-- Controls -->
                              
                          </div>

                      <!--============================== PUB2 ====================================-->
                    </div>
                  </div>
            
                </div>
              </div>
            </aside>
            @else
@endif
            <!-- Widget: Trending News / End -->
            

            <!-- Widget: Banner -->
            <!--<aside class="widget card widget--sidebar widget-banner">
              <div class="widget__title card__header">
                <h4>Advertisement</h4>
              </div>
              <div class="widget__content card__content">
                <figure class="widget-banner__img">
                  <a href="../../marketplace.envato.com/index2d78.html?ref=dan_fisher"><img src="../../front/assets/images/samples/banner.jpg" alt="Banner"></a>
                </figure>
              </div>
            </aside>-->
            <!-- Widget: Banner / End -->
            

            <!-- Widget: Newsletter -->
            <aside class="widget widget--sidebar card widget-newsletter">
              <div class="widget__title card__header">
                <h4>E-Mail DE NOTIFICATION</h4>
              </div>
              <div class="widget__content card__content">
                <h5 class="widget-newsletter__subtitle">Voulez - vous recevoir des e-mail de notifications?</h5>
                <div class="widget-newsletter__desc">
                  <p>Envoyer-nous votre adresse e-mail</p>
                </div>
                <form action="#" id="newsletter" class="inline-form">
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Adresse e-mail ici...">
                    <span class="input-group-btn">
                      <button class="btn btn-lg btn-default" type="button">Envoyer</button>
                    </span>
                  </div>
                </form>
              </div>
            </aside>
            <!-- Widget: Newsletter / End -->
            

            <!-- Widget: Match Announcement -->
            <aside class="widget widget--sidebar card widget-preview">
              <div class="widget__title card__header">
                <h4>Prochain Match</h4>
              </div>
              <div class="widget__content card__content">
            
                <!-- Match Preview -->
                <div class="match-preview">
                  <section class="match-preview__body">
                    <header class="match-preview__header">
                      <h3 class="match-preview__title">Championnat quart de finale</h3>
                      <time class="match-preview__date" datetime="2017-05-17">Saturday, May 17th, 2017</time>
                    </header>
                    <div class="match-preview__content">
            
                      <!-- 1st Team -->
                      <div class="match-preview__team match-preview__team--first">
                        <figure class="match-preview__team-logo">
                          <img src="../images/ascut.jpg" alt="">
                        </figure>
                        <h5 class="match-preview__team-name">ASCUT</h5>
                        <div class="match-preview__team-info">Antsiranana</div>
                      </div>
                      <!-- 1st Team / End -->
            
                      <div class="match-preview__vs">
                        <div class="match-preview__conj">VS</div>
                        <div class="match-preview__match-info">
                          <time class="match-preview__match-time" datetime="2017-05-17 09:00">9:00 PM</time>
                          <div class="match-preview__match-place">Mahamasina</div>
                        </div>
                      </div>
            
                      <!-- 2nd Team -->
                      <div class="match-preview__team match-preview__team--second">
                        <figure class="match-preview__team-logo">
                          <img src="../front/assets/images/samples/logo-l-clovers--sm.png" alt="">
                        </figure>
                        <h5 class="match-preview__team-name">COSFA</h5>
                        <div class="match-preview__team-info">Antananarivo</div>
                      </div>
                      <!-- 2nd Team / End -->
            
                    </div>
                    <div class="match-preview__action">
                      <a href="#" class="btn btn-default btn-block">Acheter du ticket</a>
                    </div>
                  </section>
                <!--  <section class="match-preview__countdown countdown">
                    <h4 class="countdown__title">Game Countdown</h4>
                    <div class="countdown__content">
                      <div class="countdown-counter" data-date="May 12, 2017 12:00:00"></div>
                    </div>
                  </section>-->
                </div>
                <!-- Match Preview / End -->
            
              </div>
            </aside>
            <!-- Widget: Match Announcement / End -->
            
          </div>
          <!-- Sidebar / End -->
        </div>

      </div>
    </div>

    <!-- Content / End -->

    @include('frontjers.footer')