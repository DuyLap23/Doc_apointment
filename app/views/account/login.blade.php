@extends('layout.mainLogin')
@section('content')
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{ route('account/dangnhap') }}" onsubmit="return sendDangnhap()" method="post" class="sign-in-form">
            <h2 class="title">Đăng nhập</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" 
									class="form-control emailLogin" name="emailLogin" id="email" placeholder="Email*">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" "
									class="form-control passwordLogin" name="passwordLogin" id="password_in" value=""
									placeholder="Password*">
            </div>
            <div class="err__login">
								<span>
									<?= isset($err) ? $err : "" ?>
								</span>
							</div>
              <div class="clearfix add_bottom_15">
								
								<div class="float-end"><a id="forgot" href="javascript:void(0);">Lost Password?</a>
								</div>
							</div>

            <div class="text-center"><input type="submit" name="login" value="Đăng nhập "
									class="btn_1 full-width btn solid"></div>
            <p class="social-text">Đăng nhập bằng nền tảng xã hội</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>


          <form action="{{ route('account/register') }}" onsubmit="return sendDangky()" method="post" class="sign-up-form">
            <h2 class="title">Đăng kí</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control name" name="lastName"
												placeholder="Tên *">
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" class="form-control email" name="email" id="email_2"
									placeholder="Email *">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control password" name="password" id="password_in_2"
									value="" placeholder="Mật khẩu *">
              
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="number" class="form-control phone" name="phonenumber"
												placeholder="Số điện thoại *">
            </div>
            <div class="input-field">
              <i class="fas fa-map"></i>
              <input type="text" class="form-control address" name="address" placeholder="Địa chi">
            </div>

            <div class="text-center"><input type="submit" value="Đăng kí " name="signup"
									class="btn_1 full-width btn solid"></div>
           

            <p class="social-text">Đăng nhập bằng nền tảng xã hội</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
      <div class="panels-container">

        <div class="panel left-panel">
            <div class="content">
                <h1>Lựa chọn an tâm - Nâng niu sức khỏe</h1>
                <p>Sự chăm sóc không chỉ là điều trị bệnh, mà còn là nghệ thuật chăm sóc và chia sẻ.</p>
                <button class="btn transparent" id="sign-up-btn">Đăng kí</button>
            </div>
            <img src="../images/log.svg" class="image" alt="">
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h1>Y đức sáng - Chuyên môn cao</h1>
                <p>Không có gì quý hơn việc có thể giúp đỡ và chữa lành những người đang gặp khó khăn về sức khỏe.</p>
                <button class="btn transparent" id="sign-in-btn">Đăng nhập</button>
            </div>
            <img src="../images/register.svg" class="image" alt="">
        </div>
      </div>
  
  @endsection
