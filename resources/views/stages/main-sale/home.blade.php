<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
    <div class="banner-left-circle">
        <span class="circle-top-txt">{!! $home->extra['current_bonus_title'] or 'BONUS' !!}</span>
        <span class="circle-top-sm-txt">{!! $home->base_extra['current_bonus'] or '' !!} VNG/ETH</span>
        <span class="circle-dvd-top-txt">${!! $home->base_extra['tokens_sold_usd'] or '' !!} <strong>USD</strong></span>
        <img src="{!! asset('img/circle-line.png') !!}">
        <span class="circle-dvd-top-txt">{!! $home->base_extra['tokens_sold'] or '' !!} <strong>VNG SOLD</strong></span>
        <a href="#" class="circle-buy-btn">{!! $home->extra['buy_button_title'] or 'Buy VNG Now' !!}</a>
    </div>
</div>