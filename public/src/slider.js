(function() {

    var template;

    function settings(override)
    {
        if (!override) override = {};
        var o = {
            dots: false,
            infinite: true,
            speed: 1000,
            autoplay:true,
            autoplaySpeed:3000,
            arrows:false,
            useTransform:true,
            cssEase: "cubic-bezier(0.19, 1, 0.22, 1)"
        };
        for (var prop in override) {
            o[prop] = override[prop];
        }
        return o;
    }


    function init()
    {
        template = Handlebars.compile( $("script#SliderTemplate").html() );
        $.get("/json", null, initSlider);
    }

    function initSlider(json)
    {
        var $slider = $("#Slider");

        json.forEach(function(item) {
            $slider.append( template(item) );
        });

        $slider.slick(settings({
            autoplaySpeed: $slider.hasClass('slider-lg') ? 8000 : 4000
        }));

    }

    $(document).ready(init);
})();

