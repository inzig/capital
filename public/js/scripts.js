AOS.init({
    easing: 'ease-in-out-sine'
});
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);
$('.email').on("change keyup paste",
  function(){
    if($(this).val()){
      $('.icon-paper-plane').addClass("next");
    } else {
      $('.icon-paper-plane').removeClass("next");
    }
  }
);

$('.next-button').hover(
  function(){
    $(this).css('cursor', 'pointer');
  }
);

$('.next-button.email').click(
  function(){
    $('.email-section').addClass("fold-up");
    $('.first-name-section').removeClass("folded");
  }
);

$('.first-name').on("change keyup paste",
  function(){
    if($(this).val()){
      $('.icon-lock').addClass("next");
    } else {
      $('.icon-lock').removeClass("next");
    }
  }
);

$('.next-button').hover(
  function(){
    $(this).css('cursor', 'pointer');
  }
);

$('.next-button.first-name').click(
  function(){
    $('.first-name-section').addClass("fold-up");
    $('.last-name-section').removeClass("folded");
  }
);

$('.first-name').on("change keyup paste",
  function(){
    if($(this).val()){
      $('.icon-repeat-lock').addClass("next");
    } else {
      $('.icon-repeat-lock').removeClass("next");
    }
  }
);

$('.next-button.last-name').click(
  function(){
    $('.last-name-section').addClass("fold-up");
    $('.success').css("marginTop", 0);
	document.getElementById("subForm").submit();
  }
);
function roadmap(){
var tube = document.querySelectorAll(".tube-inner");
var road_all = document.querySelectorAll(".road-map-block");
var bullet_all = document.querySelectorAll(".road-map-bullets");
var bullet_active = document.querySelectorAll(".road-map-bullets.active");
var road_active = document.querySelectorAll(".road-map-block.active");
var road_start = road_active.item(0);
var road_start_top = road_start.getBoundingClientRect().top;
var road_diff = road_start.childNodes.item(1).offsetHeight / 2;
var road_spa = road_active.item(road_active.length - 1).getBoundingClientRect().top - road_start_top;
document.querySelectorAll(".tube")[0].style.transform = 'translateY(' + road_diff + 'px)';
tube[0].style.height = road_spa + 'px';

for (i = 0; i < road_all.length; i++) {
	var c = road_all.item(i), l = c.childNodes.item(1);
	var value = c.getBoundingClientRect().top - road_start_top - road_diff - 13 + l.offsetHeight / 2;
    bullet_all[i].style.transform = 'translateY(' + value + 'px)';	
}
}
function drawChart() {

    var datacap = google.visualization.arrayToDataTable([
        ['', 'Percentage'],
        ['Public Token Sale', 85],
        ['Founder Team', 10],
		['Bounty Campaign', 5]
    ]);
    var datacapg = google.visualization.arrayToDataTable([
        ['', 'Percentage'],
        ['Public Token Sale', 85],
        ['Founder Team', 10],
        ['Bounty Campaign', 5],
    ]);
    var datafunds = google.visualization.arrayToDataTable([
        ['', 'Percentage'],
        ['Advisors & Legal', 10],
        ['Investments, Research, Hardware & Software Development', 55],
        ['Marketing', 35],
    ]);
    var optionscap = {
        title: 'Capital (CALL) token allocation',
		'backgroundColor': 'transparent',
		titleTextStyle: {fontName: 'regencie',fontSize: 20,bold: true},
		legend: {textStyle:  {fontName: 'regencie',fontSize: 15,bold: true}},
		tooltip: {textStyle:  {fontName: 'regencie',fontSize: 20,bold: true}},
        is3D: true
    };
    var optionscapg = {
        title: 'CapitalGAS (CALLG) token allocation',
		'backgroundColor': 'transparent',
		titleTextStyle: {fontName: 'regencie',fontSize: 20,bold: true},
		legend: {textStyle:  {fontName: 'regencie',fontSize: 15,bold: true}},
		tooltip: {textStyle:  {fontName: 'regencie',fontSize: 20,bold: true}},
        is3D: true
    };
    var optionsfund = {
        title: 'Funds distribution',
		'backgroundColor': 'transparent',
		titleTextStyle: {fontName: 'regencie',fontSize: 20,bold: true},
		legend: {textStyle:  {fontName: 'regencie',fontSize: 15,bold: true}},
		tooltip: {textStyle:  {fontName: 'regencie',fontSize: 20,bold: true}},
        is3D: true
    };
    var chartcap = new google.visualization.PieChart(document.getElementById('capchart'));
    var chartcapg = new google.visualization.PieChart(document.getElementById('capgchart'));
    var fundchart = new google.visualization.PieChart(document.getElementById('fund-distribution'));
    chartcap.draw(datacap, optionscap);
    chartcapg.draw(datacapg, optionscapg);
    fundchart.draw(datafunds, optionsfund);
	document.getElementById("particles-js").style.height = document.querySelectorAll("#main").item(0).offsetHeight + "px";
}

$(window).resize(function(){
  drawChart();
  roadmap();
});

function initialise() {
    var myLatlng = new google.maps.LatLng(44.63339701548197, 22.656206641441372);
    var mapOptions = {
        zoom: 17,
        minZoom: 6,
        maxZoom: 20,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.DEFAULT
        },
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        panControl: false,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: true,
        overviewMapControl: false,
        rotateControl: false
    }
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var image = new google.maps.MarkerImage("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAMAAAD04JH5AAACrFBMVEUAAAD/AAD/AAD/VVX/Pz/MMzPUKiraSCTfPz/iODjlMzPnLi7pPyrrOjrsNjbdMzPfPy/hPDziODjkNTXlMzPmPDDnOTnoNzfpNTXgPTLhOjHiODjjNjbkNDTlOzPmOTHnNzfnNjboPDThOjLiODHkNTXkOjTlOTPmNzfmNjbnOzXnOTTiODLjNzfjOzbkOjXkOTTmNzfmOjXmOTTiODPjNzLjOzbkOjXlNzPlOjbjNzPjOjbjOTbkOTXkODTlNzPlOjblOTXmODXmNzTjOTbkODTkNzTlOjPlOTblODXmNzTkOTbkODXkNzTkOTTlOTPlODXlODXmOjTmOTTjODbkODXkNzXkOTTkOTTlODblOjXmOTTjODPkODXkNzXkOTTkOTTlODPlODXlOTXlOTTlODTjODPkNzXkODTlODblOTXlOTXlODTlODTkNzXkOTXkOTXkODTkODTlOTXlOTXlODTlODTlOTTkOTXkOTXkODTkODTjOTTlOTXlODXlODTlOTTkOTXkODXkODTkOTTjOTXlODXlODXlOTTlOTTkOTXkODPkOTTjOTTlNzXlOTPlOTTlOTTkODXkODXkOTPkOTTlODXlOTXlOTPlODXkODXkOTXkOTPjNzTlOTXlOTXlNzTlODXkOTPkNzTjODTlODTlODTlOTXkOTXkNzPjODTjOTXjOTXlNzXlNzPlODTlOTXlOTXkNzXkODPjOTTjOTXlNzXlNzPlODPlOTTlOTXkNzXkODPjOTPlNzXlOTPlOTXlNzXkODXjOTPjOTPjNzXjNzXlOTXlOTPlOTPlNzXlODXkOTPjOTPjNzXjOTXlOTPlOTPlNzTlNzXlOTXjOTPjNzPjNzXjOTXjOTXlOTPlNzPlNzXlOTXlOTXjNzPjNzPjOTXjOTXlOTUJ8kqdAAAA43RSTlMAAQIDBAUGBwgJCgsMDQ4PEBESExQVFhcYGRobHB0eHyAhIiMkJicoKSorLC0uLzAxMzQ1Njc4OTw9QEFCQ0RFRkdISUtNTk9QUVJVVldYWVpbXF1eX2BhYmNlZmdoaWprbG1ub3BxcnV2d3h5ent8fX5/gIGCg4SFhoeIiYqLjI2PkJGSk5SVlpeYmpucnZ+goaKjpKWnqKmrrK2ur7Gys7W3uLm9vr/AwcLDxMXGx8jJysvMzc7P0NHS09TV2Nrb3N3e3+Dh4uPk5ebn6Orr7O3u7/Dx8vP09fb3+Pn6+/z9/mbp908AAAeUSURBVBgZxcGJfxSFGQbgd2bXXQxCIAaPiAQIFMLlRdUeFsUWldRGCRaPipZqFU16WI8CcoNHqhFRkNB4UCwlHEa5SmmqLSbEJEhYgSaa3c2m7z9Sfn7fJpnJJMzMHnke+BMonl++aV/9iUg8Hmms37up/K5iE9lizHz8/bPs58x7j80wkHmTX2jkgD5/bhIyKrjwY15AXVkQmRJe3EAXPv9FCJlg3N9Kl5rvQ/rN2k8P9kxHeoVXJ+hJ14shpFHRYdokDlY9OW9GYV4olFc4446lVYe6aXNgAtLmp+do0bJ+Xi5sRt2xoZUWZ+cjTZ5lX51v32rCUeC2LVH29Tukg/kq+2hfdQUGceWaDvax0UTKQtXs1bUmDxeQvy7BXttCSJG5nb32TocLsz5ir20mUvMqe8SWGHDF+HWcPTYiJc+yx/Hr4NrsBvb4LVJQwh67cuHB6Fr2uAu+FZ1j0vYwPBlWw6Qz4+FT+DCTXjfhUeANJh0IwZ/VTNpuwrPAu0xaAV9mJah2heHDsFqqrmnwwdhPdTwXvoxupKqFD/dTxa6DT9+NUy2EZ+FWqiXw7Qmq5hC8Wky1x4Aj86aKmvpIPB6prym/0YQjo47qQXgUbKDomg4n41a2sI/mFVfDyTUJiuMBeLOQag0cXPZanDaxynw42EC1AN58TNGeh/7KvqKDSCn6G/M1xX54MplqFfq5qIoDqAyin7VURfDieYrOK2CXs5MD2pEDu4IoxR/ggdFA8TbsLtrJQewIwm4rxXF4MJPqVti9zkFVwu52qmlw73GKFhM2ZezVsGxOQShUMGd5I3v9DDaBLyl+Cffep1gPm8vOMKnxbhPKLG1i0ulLYfMSRQ1cC5ylmAeb15i0ZTj6uGQrk16BzXyKiAm3iikSubAaF6daDZu1VLGrYJXXTTEFbs2nOASblVRbYGdso1oOmyMUd8CtcooqWJktFI3D0c+ILyiaDFi9QbEUbm2ieBJWN1HdDQf3Us2G1dMUVXBrH8U8WFVQNJhwEDhB8TSs7qKohVv1FDNgVUOxDI5WUlTDahbFP+DWCYpCWNVTzIGjuRTHYDWB4nO4FaHIg1WEogCOxlK0wSqfog1uxSlCsIpThOAoTBGDVZgiBrfaKXJgFacIwVGYIgar4RQxuPUZxThYRSgK4GgsRRusxlO0wa1aiuthVU8xB47mUhyD1WyKT+HWVoqFsKqhWA5HqyiqYbWIYgfcWkOxAVblFI0mHASaKJ6C1csU6+DWfRR1sLqRqhQOyqhugNUBikVwazxF7BJYmM0UTZegn5HNFCcMWIyMUxTDtUaK+bB6kWor7IxqqmWwKqE4a8C1TRRVsLo6TrXWgIWxnipaAKs3KWrg3iKKkyasKpm0bQT6GFnNpI2wCpyieBjuFVLdAqv8CJO+uDcAFShrZtKp0bC6jWo8PDhAsQk2pex1YuXcseHw2LmrmtirBDZvURyBF49TtOfAppKDegk2wzsoyuHFld0U98ImuIOD+CAAm4VUk+DJXyn2wS5nBwf0wcWwq6OogzcPUM2EXbCSA3gpALtrqR6GN6OiFJXor/Q0HZwqQX+vU3SOgkdvUnTkor9LX4nRJrpxNPob/Q3FZnh1PdVSOBm7vIl9nFhWACcVVDfBszqKlhAcmbOfrj7WFou1Hat+6gYDjsInKY7Cu3uoFsG3B6kegHcXtVL8y4BPxqcUp4bBh2eo7oRP86mehR+Xd1Ichj/GUYrOy+HLy1Q/gS93Ur0Kf8bFKQ7BlyMUiYnwqYrqx/BhHtUW+DUpQXHYgGfGUYruYvi2haoEnpVSvQP/iv9H8WkAHgX/TdE9DSnYRvUAPHqI6h2kYnIXRdMweHJxM0ViMlLyJ6ql8KScqgqpueobirOXwoMx5yhihUjRSqr18OBlqnVI1egzFPFJcO07XRTn8pGyCqo/w7X3qH6D1OW0UH0fLv2IqiUHaXAf1dEAXAn8k+rnSAfjINXDcOVRqiMm0uJmqrZRcCEvQvUDpEk11Tq4sIHqXaTLhChF13Rc0KwERXQi0mYFVS0uaC/VCqTPiJNU9+ACyqhaRyCNFlC1jsCgcr+kWoC0qqVag0Gto9qL9JrRRdE1E4O4NkGRuAZpto7qIwMDMj+h2oh0yz1J9RAGtJjqy1ykXRnVV2MwgMvPUJUhA3ZTbcYAtlDtRiZMiVHNgaO5VLEpyIjnqI7nwMHwBqrnkRnhz6hWwsEaqv8MQ4b8kKrrGvRzfYLqFmTMZqpDAdgE/061GZkz5jTVUthUUJ3ORwYtpOqcDIupUaoFyKidVHsM9GF+RPUXZFZhO9Wj6OMxqo5CZNgSqvbx6DGxg+pXyDRzP9UuA8rYTbXfRMZNjVI9ArWEKjoVWVBO1TEB3yr6mqoc2RA4SPU3A+cZtVQHA8iKaVGqx3DeE1SxaciSCqpvpgDFnVQVyJbAQaoDweAhqgMBZM20KNXvn6GKFiOLllJ1dVE9iWwy99Fmn4msKuqgRUcRsuwRWixGthkfso8PkX0FEfaIFGAIlLBHCYbEW1SbMTRyG/mthpEYIt/r5nndN2PI/JHnvYChE/yE/CSIIVTU/t+JGFJlC5Ca/wMMph+sa01J5gAAAABJRU5ErkJggg==", null, null, null, new google.maps.Size(40, 40));
    var marker = new google.maps.Marker({
        position: myLatlng,
        icon: image,
        map: map,
        title: 'Click here for more details'
    });
    var infowindow = new google.maps.InfoWindow({
        content: "<strong>Capital Technologies & Research SRL</strong>, 37 Plevnei Street, Drobeta-Turnu-Severin, Romania"
    });
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });
    google.maps.event.addDomListener(window, 'resize', function() {
        map.setCenter(myLatlng);
    });
}
google.maps.event.addDomListener(window, 'load', initialise);
$('.map').click(function() {
    $('.modal-img').modal('show');
    var newSrc = this.src;
    $('.modal-img-content').attr('src', newSrc);
});
$('#close-img').click(function() {
    $('.modal-img').modal('hide');
});
var modalprivacy = document.getElementById('privacyModal');
var modalterms = document.getElementById('termsModal');
var btnprivacy = document.getElementById("privacy");
var btnterms = document.getElementById("terms");
var spant = document.getElementsByClassName("closeterms")[0];
var spanp = document.getElementsByClassName("closeprivacy")[0];
btnprivacy.onclick = function() {
    modalprivacy.style.display = "block";
}
btnterms.onclick = function() {
    modalterms.style.display = "block";
}
spanp.onclick = function() {
    modalprivacy.style.display = "none";
}
spant.onclick = function() {
    modalterms.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modalprivacy) {
        modalprivacy.style.display = "none";
    }
    if (event.target == modalterms) {
        modalterms.style.display = "none";
    }
}
$(document).ready(function() {
    $("#myModal").on("hidden.bs.modal", function() {
        $("#iframeYoutube").attr("src", "#");
    })
})

function changeVideo(vId) {
    var iframe = document.getElementById("iframeYoutube");
    iframe.src = "https://www.youtube.com/embed/" + vId;
    $("#myModal").modal("show");
}
$('.panel-collapse').on('show.bs.collapse', function() {
    $(this).siblings('.panel-heading').addClass('active');
});

$('.panel-collapse').on('hide.bs.collapse', function() {
    $(this).siblings('.panel-heading').removeClass('active');
});
$(document).ready(function() {
	roadmap();
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    $('#back-to-top').click(function() {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 1500);
        return false;
    });
    $('#back-home').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 1500);
        return false;
    });
    $('#back-to-top').tooltip('show');

});
$(document).ready(function() {
    $('#press1').carousel({
        interval: 5000
    })
});
$(document).ready(function() {
    $('#press-2').carousel({
        interval: 5000
    })
});
$(document).ready(function() {
    $('#press-3').carousel({
        interval: 5000
    })
});
$(document).ready(function() {
    var navItems = $('.admin-menu li > a');
    var navListItems = $('.admin-menu li');
    var allWells = $('.admin-content');
    var allWellsExceptFirst = $('.admin-content:not(:first)');

    allWellsExceptFirst.hide();
    navItems.click(function(e) {
        e.preventDefault();
        navListItems.removeClass('active');
        $(this).closest('li').addClass('active');

        allWells.hide();
        var target = $(this).attr('data-target-id');
        $('#' + target).show();
    });
});
$(document).ready(function() {
    $('#team-carousel').carousel({
        interval: 5000
    })
});
$(document).ready(function() {
    $('#team-carousel1').carousel({
        interval: 5000
    })
});
if (document.documentElement.clientWidth >= 768) {
    $('.multi-item-carousel').carousel({
        interval: false
    });
    $('.multi-item-carousel .item').each(function() {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
}
function offsetTop(el, i) { i = i || 0; return $(el)[i].getBoundingClientRect().top - $('.navbar-fixed-top').height()}
$(document).ready(function() {
    $('body, html').translate({
        lang: "en",
        t: dict
    }).lang("en");
    $(".main-banner, .roadmap").on("click", function() {
        $("#feature-inner").removeClass("nevigated");
    });
    $('.main-banner').click(function() {
        $('body,html').animate({
            scrollTop: $('.main').offset().top
        }, 1500);
        return false;
    });
    $('.team_id').click(function() {
        $('body,html').animate({
            scrollTop: $('.team_section').offset().top
        }, 1500);
        return false;
    });
    $('.roadmap').click(function() {
        $('body,html').animate({
            scrollTop: $('#roadmap').offset().top
        }, 1500);
        return false;
    });
    $('.tokensale').click(function() {
        $('body,html').animate({
            scrollTop: $('#tokensale').offset().top - $('.navbar-fixed-top').height()
        }, 1500);
        return false;
    });
    $('.feature').on('click', function(e) {
        $('body,html').animate({
            scrollTop: offsetTop('#about') - 13
        }, 1500);
    });
    $('.tokensale').click(function() {
        $('body,html').animate({
            scrollTop: $('#tokensale').offset().top
        }, 1500);
        return false;
    });

    $('.faq').click(function() {
        $('body,html').animate({
            scrollTop: $('#faq').offset().top - $('.navbar-fixed-top').height()
        }, 1500);
        return false;
    });
    $('.press_id').click(function() {
        $('body,html').animate({
            scrollTop: $('#press-release').offset().top
        }, 1500);
        return false;
    });
    $('.change-ro').click(function() {
        $('body, html').translate({
            lang: "en",
            t: dict
        }).lang("ro");
    });
    $('.change-en').click(function() {
        $('body, html').translate({
            lang: "en",
            t: dict
        }).lang("en");
    });
    $('.change-fr').click(function() {
        $('body, html').translate({
            lang: "en",
            t: dict
        }).lang("fr");
    });
});
$('.nav a').on('click', function(){
    $('.navbar-toggle').click();
});