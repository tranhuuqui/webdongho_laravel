
    <div class="container" style="padding-top: 10px;">
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="nutcarousel carousel-indicators rounded-circle">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
                <li data-target="#carouselId" data-slide-to="2"></li>
                </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#"><img src="{{asset('public/frontend/images/banner1.jpg')}}" class="img-fluid"
                        style="height: 350px;" width="100%" alt="First slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="#"><img src="{{asset('public/frontend/images/banner2.jpg')}}" class="img-fluid"
                        style="height: 350px;" width="100%" alt="Second slide"></a>
            </div>
                <div class="carousel-item">
                    <a href="#"><img src="{{asset('public/frontend/images/banner3.jpg')}}" class="img-fluid"
                        style="height: 350px;" width="100%" alt="Third slide"></a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
