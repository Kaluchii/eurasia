$(document).ready(function () {

    //===============================================================
    //======= Обработчики для подсветки текущего пунтка меню ========
    //===============================================================
    var items = document.location.pathname;
    var category = items.split('/')[1];
    var category2 = items.split('/')[2];
    var category3 = items.split('/')[3];

    // Подсветка текущего пункта меню для общего меню
    $('.menu-item .link').each(function () {
        if ($(this).attr('href') == '/' + category) {
            $(this).closest('.menu-item').addClass('active');
        }
    });
    $('.room-count-item .link').each(function () {
        if ($(this).attr('href') == '/flats/' + category2) {
            $(this).closest('.link-wrap').addClass('active');
        } else if (category2 === undefined) {
            $('.room-count-item:first-child .link-wrap').addClass('active');
        }
    });
    $('.layouts .link').each(function () {
        if ($(this).attr('href') == '/flats/' + category2 + '/' + category3) {
            $(this).closest('.link-wrap').addClass('active');
        } else if (category3 === undefined) {
            $('.layouts .link-wrap:first-child').addClass('active');
        }
    });
    //==================================================================

    //===============================================================
    //======= Обработчики для подсветки текущего пунтка ========
    //===============================================================

    // Подсветка текущего пункта меню галереи и открытие нужного слайдера
    $('.nav-item').on('click', function () {
    });
    //==== Форма "Написать письмо"
    $('#write').magnificPopup({
        type: 'inline',
        removalDelay: 500,
        callbacks: {
            beforeOpen: function () {
                this.st.mainClass = 'mfp-zoom-in';
            }
        },
        midClick: true
    });
    $('#answer').magnificPopup({
        type: 'inline',
        removalDelay: 500,
        callbacks: {
            beforeOpen: function () {
                this.st.mainClass = 'mfp-zoom-in';
            }
        },
        midClick: true
    });
    $('#installment_plan').magnificPopup({
        type: 'inline',
        removalDelay: 500,
        callbacks: {
            beforeOpen: function () {
                this.st.mainClass = 'mfp-zoom-in';
            }
        },
        midClick: true
    });


    if ($('.layout-img').length > 0) {
        function ZoomIn() {
            $('.layout-img').addClass('zoom');
        }

        function ZoomOut() {
            $('.layout-img').removeClass('zoom');
        }

        $('.layout-img').zoom({
            url: $('.layout-img').data('url'),
            on: 'click',
            onZoomIn: ZoomIn,
            onZoomOut: ZoomOut
        });
    }

    if ($('.calculator').length > 0) {

////////////////////////////////////////////////////////////////////////////////////////////////////


        // в инпут только цифры #roof, #roof2

        $(document).ready(function () {

            $(".calculator__contribution-input").keydown(function (event) {
                // Разрешаем: backspace, delete, tab и escape
                if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
                    // Разрешаем: Ctrl+A
                    (event.keyCode == 65 && event.ctrlKey === true) ||
                    // Разрешаем: home, end, влево, вправо
                    (event.keyCode >= 35 && event.keyCode <= 39)) {
                    // Ничего не делаем
                    return;
                }

                else {
                    // Убеждаемся, что это цифра, и останавливаем событие keypress
                    if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                        event.preventDefault();
                    }
                }
            });

        });

        // разделение цифр в инпуте

        (function () {

            var prev_value = "";

            var input = document.getElementById("contribution");

            input.onkeyup = input.onchange = input.onpaste = function () {

                this.value = this.value.replace(/[^\d\s]/g, "");

                if (prev_value == this.value)// отслеживаем изменение значения

                    return;

                prev_value = this.value;

                this.value = this.value.replace(/[^\d]/g, "").split("").reverse().join("").replace(/\d{3}(?!$|(?:\s$))/g, "$& ").split("").reverse().join("");

            };

        })();


        $('.digit-incrementer__button--dec').on('click', function () {
            var value = $('.digit-incrementer__result').attr('value');

            if (value > 1) {
                value--;
                $('.digit-incrementer__result').attr('value', value);
            }
        });


        $('.digit-incrementer__button--inc').on('click', function () {
            var value = $('.digit-incrementer__result').attr('value');

            if (value < 12) {
                value++;
                $('.digit-incrementer__result').attr('value', value);
            }
        });


        function buttonCondition() {
            var area = $('.calculator__layout-area-btn--active').data('area'),
                meter_price_tg = $('.calculator__flat-cost').data('meter_tg_cost');

            if (Math.round(area * meter_price_tg / 10 * 3) <= $('.calculator__contribution-input').val().replace(/\s+/g,'')) {
                $('.calculator__calc').addClass('calculator__calc--active');
            } else {
                $('.calculator__calc').removeClass('calculator__calc--active');
            }
        }

        /***
         number - исходное число
         decimals - количество знаков после разделителя
         dec_point - символ разделителя
         thousands_sep - разделитель тысячных
         fractional_not_view - не отображать знаки после разделителя у целых чисел
         ***/
        function number_format(number, decimals, dec_point, thousands_sep, fractional_not_view) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                fr_not_view = (typeof fractional_not_view === 'undefined') ? false : fractional_not_view,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + (Math.round(n * k) / k)
                            .toFixed(prec);
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
                .split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            // Чтобы не отображать знаки после запятой у целых чисел
            if (fr_not_view && (n - Math.round(n) == 0)) {
                return n;
            }
            //////
            if ((s[1] || '')
                    .length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1)
                    .join('0');
            }
            return s.join(dec);
        }

        $('.calculator__layout-area-btn').each(function () {
            $(this).text(number_format($(this).text(), 1, ',', ' ', true));
        });

        function layoutPrice() {
            var area = $('.calculator__layout-area-btn--active').data('area'),
                meter_price_dollar = $('.calculator__flat-cost').data('meter_dollar_cost'),
                meter_price_tg = $('.calculator__flat-cost').data('meter_tg_cost');

            $('.calculator__flat-cost-tg').text(number_format(Math.round(area * meter_price_tg), 0, ',', ' '));
            $('.calculator__flat-cost-dollars').text(number_format(Math.round(area * meter_price_dollar), 0, ',', ' '));
        }


        function contributionHint() {
            var area = $('.calculator__layout-area-btn--active').data('area'),
                meter_price_tg = $('.calculator__flat-cost').data('meter_tg_cost');
            var half_tg = number_format(Math.round(area * meter_price_tg / 10 * 3), 0, ',', ' ');

            $('.calculator__contribution-input').attr('placeholder', 'не менее ' + half_tg + ' тг');
        }


        $('.calculator__contribution-input').on('input', function () {
            var dollar_price = $(this).data('dollar_price');
            var dollars = number_format(Math.round($('.calculator__contribution-input').val().replace(/\s+/g,'') / dollar_price), 0, ',', ' ');
            $('.calculator__contribution-dollar').text(dollars + ' $');
            buttonCondition();
        });

        layoutPrice();
        contributionHint();


        $('.calculator__layout-area-btn').on('click', function () {
            if (!$(this).hasClass('calculator__layout-area-btn--active')) {
                $('.calculator__layout-area-btn--active').removeClass('calculator__layout-area-btn--active');
                $(this).addClass('calculator__layout-area-btn--active');
                $('.calculator__contribution-input').val('');
                layoutPrice();
                contributionHint();
                buttonCondition();
            }
        });

        function count() {
            var area = $('.calculator__layout-area-btn--active').data('area'),
                priceTg = $('.calculator__flat-cost').data('meter_tg_cost'),
                priceDl = $('.calculator__flat-cost').data('meter_dollar_cost'),
                firstContribTg = $('.calculator__contribution-input').val().replace(/\s+/g,''),
                firstContribDl = Math.round(firstContribTg / $('.calculator__contribution-input').data('dollar_price')),
                term = $('.digit-incrementer__result').val();



            $('.calculator__payment-tg').text(number_format(Math.round((priceTg * area - firstContribTg) / term), 0, ',', ' '));
            $('.calculator__payment-dollar').text(number_format(Math.round((priceDl * area - firstContribDl) / term), 0, ',', ' '));

            $('.calculator__row--payment').css('opacity', '1')
        }

        $('.calculator__calc').on('click', function () {
            if ($(this).hasClass('calculator__calc--active')) {
                count();
            }
        });
    }
});