jQuery(function($) {
    // Scrollbars
    $('.md-modal').mCustomScrollbar({
			mouseWheel: {preventDefault: false},
			contentTouchScroll: false,
			documentTouchScroll: false,
			theme: 'rounded',
		});

		$('.custom-scroll').mCustomScrollbar({theme: 'rounded'});

    $(document).ready(function() {
        $('.banner-items').slick({
            // autoplay: true,
            // autoplaySpeed: 2000,
            dots: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
        $('.recipe-slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        });
    });

    //caching
    //next and prev buttons
    var $cn_next = $('#cn_next');
    var $cn_prev = $('#cn_prev');
    //wrapper of the left items
    var $cn_list = $('#cn_list');
    var $pages = $cn_list.find('.cn_page');
    //how many pages
    var cnt_pages = $pages.length;
    //the default page is the first one
    var page = 1;
    //list of news (left items)
    var $items = $cn_list.find('.cn_item');
    //the current item being viewed (right side)
    var $cn_preview = $('#cn_preview');
    //index of the item being viewed.
    //the default is the first one
    var current = 1;

    $items.each(function(i) {
        var $item = $(this);
        $item.data('idx', i + 1);

        $item.bind('click', function() {
            var $this = $(this);
            $cn_list.find('.selected').removeClass('selected');
            $this.addClass('selected');
            var idx = $(this).data('idx');
            var $current = $cn_preview.find('.cn_content:nth-child(' + current + ')');
            var $next = $cn_preview.find('.cn_content:nth-child(' + idx + ')');

            if (idx > current) {
                $current.stop()
                    .animate({
                        'top': '-540px'
                    }, 600, 'easeOutBack', function() {
                        $(this).css({
                            'top': '540px',//прячем, листая вперед
                        });
                    });
                $next.css({
                        'top': '540px'
                    }).stop()
                    .animate({
                        'top': '0px'
                    }, 600, 'easeOutBack');
            } else if (idx < current) {
                $current.stop()
                    .animate({
                        'top': '540px'
                    }, 600, 'easeOutBack', function() {
                        $(this).css({
                            'top': '540px'//прячем, листая назад
                        });
                    });

                $next.css({
                        'top': '-540px'
                    }).stop()
                    .animate({
                        'top': '0px'
                    }, 600, 'easeOutBack');
            }
            current = idx;
        });
    });

    $cn_next.bind('click', function(e) {
        var $this = $(this);
        $cn_prev.removeClass('disabled');
        ++page;
        if (page == cnt_pages)
            $this.addClass('disabled');
        if (page > cnt_pages) {
            page = cnt_pages;
            return;
        }
        $pages.hide();
        $cn_list.find('.cn_page:nth-child(' + page + ')').fadeIn();
        e.preventDefault();
    });

    $cn_prev.bind('click', function(e) {
        var $this = $(this);
        $cn_next.removeClass('disabled');
        --page;
        if (page == 1)
            $this.addClass('disabled');
        if (page < 1) {
            page = 1;
            return;
        }
        $pages.hide();
        $cn_list.find('.cn_page:nth-child(' + page + ')').fadeIn();
        e.preventDefault();
    });
});
