        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                 <!-- Brand and toggle get grouped for better mobile display -->
                 <div class="container">
                     <div class="navbar-header">
                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                             <span class="sr-only">Toggle navigation</span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                         </button>
                         <a class="navbar-brand" href="./">Acme</a>
                     </div>

                     <!-- Collect the nav links, forms, and other content for toggling -->
                     <div class="collapse navbar-collapse navbar-ex1-collapse">
                         <ul class="nav navbar-nav">
                             <li class="active"><a href="./">Home</a></li>
                             <li><a href="about-acme">About</a></li>
                             @if (!App\Auth\LoggedIn::user())
                                <li><a href="register">Register</a></li>
                              @endif
                             <li><a href="testimonials">Testimonials</a></li>
                              @if ((App\auth\LoggedIn::user()) && (App\auth\LoggedIn::user()->access_level == 2))
                                <li><a href="add-testimonial">Add a Testimonial</a></li>
                             @endif
                         </ul>
                         <ul class="nav navbar-nav navbar-right">
                              @if ((App\auth\LoggedIn::user()) && (App\auth\LoggedIn::user()->access_level == 2))
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                                  <ul class="dropdown-menu">
                                      <li><a href="#" class="menu-item" onclick="makePageEditable(this)">Edit Page</a></li>
                                      <li class="divider" role="seperator"></li>
                                      <li><a href="/admin/page/add">Add a page</a></li>
                                  </ul>
                              </li>
                              <li>
                                   <a href="logout"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> logout</a>
                              </li>

                                @elseif (App\auth\LoggedIn::user())
                                <li>
                                     <a href="logout"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> logout</a>
                                </li>

                              @else
                                <li>
                                   <a href="login"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Login</a>
                                </li>
                              @endif

                         </ul>
                     </div><!-- /.navbar-collapse -->
                 </div><!-- ./ cotainer -->
             </nav>

