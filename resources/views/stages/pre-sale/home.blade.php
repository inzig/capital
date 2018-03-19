<div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 wow fadeIn padding-col-md-6 top-right-col" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
    <div class="countdown-padding margin-top-30">
        <div class="wow fadeInUp" data-wow-delay="0.3s">
            <div>
                <h3 class="presale-heading">{!! $presale->extra['presale_ends_title'] or 'PRE SALE ENDS IN' !!}</h3>
                <div id="clockdiv">
                    <div class="timer">
                        <span class="days"></span>
                        <div class="smalltext">Days</div>
                    </div>
                    <span class="dot-size">:</span>
                    <div class="timer">
                        <span class="hours"></span>
                        <div class="smalltext">Hours</div>
                    </div>
                    <span class="dot-size">:</span>
                    <div class="timer">
                        <span class="minutes"></span>
                        <div class="smalltext">Minutes</div>
                    </div>
                    <span class="dot-size">:</span>
                    <div class="timer">
                        <span class="seconds"></span>
                        <div class="smalltext">Seconds</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
        <div class="col-md-12 text-center padding-progressbar margin-top-60">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-15">
                <div class="c1">
                    {!! $home->extra['tokens_to_sell_title'] or 'Tokens To Sell' !!}<br>
                    {!! $home->base_extra['tokens_to_sell'] or '' !!} <strong>VNG</strong>
                </div>
                <div class="c4">
                    {!! $home->extra['tokens_remaining_title'] or 'Tokens Remaining' !!}<br>
                    {!! $home->base_extra['tokens_remaining'] or '' !!} <strong>VNG</strong>
                </div>
                <div class="progress progress-bar-style">
                    <div class="one progressbar-succes-color"></div>
                    <div class="progress-bar progress-bar-completed" style="width: @if(!empty($home->base_extra['tokens_remaining']) && !empty($home->base_extra['tokens_to_sell'])) {!! 100 - (($home->base_extra['tokens_remaining'] / $home->base_extra['tokens_to_sell']) * 100) !!}% @else 0% @endif"></div>
                </div>
                <div class="progress-bar-btm-txt">{!! $home->extra['tokens_remaining_at_bonus_title'] or '' !!}</div>
                <div class="progress-bar-btm-txt">{!! $home->base_extra['tokens_remaining_at_bonus'] or '' !!} VNG</div>
                <span class="progress-bar-btm-txt align-center">{!! $home->extra['next_bonus_title'] or '' !!} {!! $home->base_extra['next_bonus'] or '' !!} VNG/ETH</span>
            </div>
        </div>
    </div>

</div>