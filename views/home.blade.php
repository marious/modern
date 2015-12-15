@extends('base')

        @section('outSideContainer')

        <div id="carousel-id" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                <li data-target="#carousel-id" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img alt="First slide" src="assets/img/01.jpg">
                    <div class="carousel-caption">
                        Acme Nature Tours
                    </div>
                </div>
                <div class="item">
                    <img alt="Second slide" src="assets/img/02.jpg">
                    <div class="carousel-caption">
                        Experience Nature as Never Before
                    </div>
                </div>
                <div class="item">
                    <img alt="Third slide" src="assets/img/03.jpg">
                    <div class="carousel-caption">
                        Register Now!
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        @stop


            @section('containerContent')


              <br>
                <div class="col-md-4 well text-center">
                  <h3>About</h3>
                  <span class="glyphicon glyphicon-globe bigger-icon"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-md-4 well empty-well text-center">
                  <h3>Tours</h3>
                  <span class="glyphicon glyphicon-eye-open bigger-icon"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-md-4 well text-center">
                  <h3>Contact</h3>
                  <span class="glyphicon glyphicon-earphone bigger-icon"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>

        @stop
