@extends('index_layout')
@section('content')
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="#">Liên hệ</a></li>
            </ol>
            <br>
            <hr>
        </div>
    </section>

   <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center" style="color: blue;">Giới thiệu</h2>
						<h4>Fanpage</h4>
						<a target="_blank" href="https://www.facebook.com/Shop-dong-ho-110258754598885/?ref=pages_you_manage"></a>
						<div id="fb-root"></div>
						<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="uWz0AlfP"></script>
						<div class="fb-page" data-href="https://www.facebook.com/Shop-dong-ho-110258754598885/?ref=pages_you_manage" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Shop-dong-ho-110258754598885/?ref=pages_you_manage" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Shop-dong-ho-110258754598885/?ref=pages_you_manage">Shop dong ho</a></blockquote></div>
	    				<h4>Bản đồ</h4>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.965525601951!2d105.75544871428211!3d10.019703575445059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08849cdb7a7b5%3A0x269dc01b93bc8271!2zMTMyLCAxNCDEkC4gMy0yLCBIxrBuZyBM4bujaSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1635867605892!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center" style="color: blue;">Thông tin liên hệ</h2>
	    				<address>
	    					<p>Tên: Q-STORE</p>
							<p>Địa chỉ 1: 123,đường 3/2,Hưng Lợi, Ninh Kiều, Cần Thơ</p>
							<p>Địa chỉ 2: 456,đường 3/2,Hưng Lợi, Ninh Kiều, Cần Thơ</p>
							<p>Số điện thoại: 0909090909</p>
							<p>Email: qstore@gmail.com</p>
	    				</address>
						<meta property="og:url"           content="http://localhost/DoAn/shopdongho_laravel/show-lienhe" />
						<meta property="og:type"          content="website" />
						<meta property="og:title"         content="Cửa hàng đồng hồ Q-STORRE" />
						<meta property="og:description"   content="Thông tin liên hệ" />
						<meta property="og:image"         content="{{url('public/frontend/images/logo.png')}}" />
	    				<div class="social-networks">
	    					<h2 class="title text-center" style="color: blue;">Social Networking</h2>
							<div id="fb-root"></div>
								<script>(function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
								fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>

								<!-- Your share button code -->
								<div class="fb-share-button" data-size="large"
								data-href="https://www.facebook.com/Shop-dong-ho-110258754598885/?ref=pages_you_manage" 
								data-layout="button_count">
								</div>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>
            </div>
            <!--het div noidung-->
        </div>
        <!--het container-->
    </section>
    
@endsection