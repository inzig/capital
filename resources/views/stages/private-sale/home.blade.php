<div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 wow fadeIn padding-col-md-6 top-right-col" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
    <div class="banner-slider-txt-item">
        <h1 class="features-heading-2 margin-top-20 enter-email-heading aos-init aos-animate" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">{!! $home->title or 'VANIG MISSION' !!}</h1>
        <div class="main-sllider-content">
            {!! $home->description or '' !!}
        </div>
        <div class="input-group stay_update">
            <input name="email" class="form-control submit_field banner_email_field" placeholder="{!! $home->extra['email'] or 'Enter your email to subscribe' !!}" type="email" required>
            <div class="input-group-btn">
                <button class="btn btn-default search_btn banner-sub-btn subscribe" type="submit">{!! $home->extra['subscribe'] or 'SUBSCRIBE' !!}</button>
            </div>
        </div>
    </div>
    <div class="countdown-padding margin-top-30">
        <div class="wow fadeInUp" data-wow-delay="0.3s">
            <div>
                <h3 class="presale-heading">{!! $presale->extra['presale_ends_title'] or 'PRE SALE ENDS IN' !!}</h3>
                <div id="clockdiv">
                    <div class="timer">
                        <span class="days">0</span>
                        <div class="smalltext">Days</div>
                    </div>
                    <span class="dot-size">:</span>
                    <div class="timer">
                        <span class="hours">00</span>
                        <div class="smalltext">Hours</div>
                    </div>
                    <span class="dot-size">:</span>
                    <div class="timer">
                        <span class="minutes">00</span>
                        <div class="smalltext">Minutes</div>
                    </div>
                    <span class="dot-size">:</span>
                    <div class="timer">
                        <span class="seconds">00</span>
                        <div class="smalltext">Seconds</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>