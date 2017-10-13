jQuery(document).ready(function () {

    "use strict";

    /*--------------------------------------------
    		Responsive-menu Settings
    ---------------------------------------------*/
    var menuLeft = $("#cbp-spmenu-s1"),
        showLeftPush = $("#showLeftPush"),
        bodyWrap = $("body");
    showLeftPush.on('click', function () {
        $(this).toggleClass('active');
        bodyWrap.toggleClass('menu-collapsed menu-expanded');
        menuLeft.toggleClass('active');
        disableOther('showLeftPush');
        var logoText = $(".logo-text");
        logoText.fadeToggle();
    });

    function disableOther(button) {
        if (button !== 'showLeftPush') {
            showLeftPush.toggleClass('disabled');
        }
    }
    $('.accordion-menu [data-accordion]').accordion();

    $('.nav-item[data-control]').on('mouseover', function () {
        $(this).addClass('hovered');
    });

    $('.nav-item[data-control]').on('mouseleave', function () {
        $(this).removeClass('hovered');
    });

    $(function () {
        // whenever we hover over a menu item that has a submenu
        $('.nav-item.has-sub').on('mouseover', function () {
            var $menuItem = $(this),
                $submenuWrapper = $('+ .menu-content', $menuItem),
                $menuTitle = $('.menu-title', $menuItem);

            // grab the menu item's position relative to its positioned parent
            var menuItemPos = $menuItem.position();

            // place the submenu in the correct position relevant to the menu item
            $submenuWrapper.css({
                top: menuItemPos.top + 40,
                left: 50
            });
            $menuTitle.css({
                top: menuItemPos.top,
                left: 50,
            });
        });
    })

    /*--------------------------------------------
    		Seaarch Box Settings
    ---------------------------------------------*/
    var submitIcon = $('.searchbox-icon');
    var inputBox = $('.searchbox-input');
    var searchBox = $('.searchbox');
    var isOpen = false;
    submitIcon.on('click', function () {
        if (isOpen == false) {
            searchBox.addClass('searchbox-open');
            inputBox.focus();
            isOpen = true;
        } else {
            searchBox.removeClass('searchbox-open');
            inputBox.focusout();
            isOpen = false;
        }
    });
    submitIcon.on('mouseup', function () {
        return false;
    });
    searchBox.on('mouseup', function () {
        return false;
    });
    $(document).on('mouseup', function () {
        if (isOpen == true) {
            $('.searchbox-icon').css('display', 'block');
            submitIcon.click();
        }
    });

    function buttonUp() {
        var inputVal = $('.searchbox-input').val();
        inputVal = $.trim(inputVal).length;
        if (inputVal !== 0) {
            $('.searchbox-icon').css('display', 'none');
        } else {
            $('.searchbox-input').val('');
            $('.searchbox-icon').css('display', 'block');
        }
    }

    /*--------------------------------------------
    		Counter Settings
    ---------------------------------------------*/

    $('.number').counterUp({
        delay: 10,
        time: 1000
    });

    /*--------------------------------------------
    		Slider-drag-drope Settings
    ---------------------------------------------*/
    $("#ex12a").bootstrapSlider({
        id: "slider12a",
        min: 0,
        max: 10,
        value: 5
    });

    $("#ex16b").bootstrapSlider({
        min: 0,
        max: 10,
        value: [2, 8],
        focus: true
    });

    $("#ex17b").bootstrapSlider({
        min: 0,
        max: 10,
        value: 2,
        formater: function (value) {
            return 'Current value: ' + (this.max - value);
        },
        orientation: 'vertical',
    });
    $("#ex18b").bootstrapSlider({
        min: 0,
        max: 10,
        value: 4,
        formater: function (value) {
            return 'Current value: ' + (this.max - value);
        },
        orientation: 'vertical',
    });
    $("#ex19b").bootstrapSlider({
        min: 0,
        max: 10,
        value: 6,
        formater: function (value) {
            return 'Current value: ' + (this.max - value);
        },
        orientation: 'vertical',
    });
    $("#ex20b").bootstrapSlider({
        min: 0,
        max: 10,
        value: 5,
        formater: function (value) {
            return 'Current value: ' + (this.max - value);
        },
        orientation: 'vertical',
    });
    $("#ex21b").bootstrapSlider({
        min: 0,
        max: 10,
        value: 3,
        formater: function (value) {
            return 'Current value: ' + (this.max - value);
        },
        orientation: 'vertical',
    });
    $("#ex22b").bootstrapSlider({
        min: 0,
        max: 10,
        value: 2,
        formater: function (value) {
            return 'Current value: ' + (this.max - value);
        },
        orientation: 'vertical',
    });
    /*--------------------------------------------
    		Form Validation  Settings
    ---------------------------------------------*/
    $('#myForm').validator();
    /*--------------------------------------------
    		Accordian Settings
    ---------------------------------------------*/

    $('.nav-list').on('click', 'li', function () {
        $('.card.active').removeClass('active');
        $(this).addClass('active');
    });
    /*--------------------------------------------
    		Tree-view Settings
    ---------------------------------------------*/
    $('.tree-view').treed();
    $(".tree-view .selected").parents('.tree-view .branch').map(function () {
        console.log($(this));
        $(this).children().children().toggle();
    });
    /*--------------------------------------------
    		Input-mask Settings
    ---------------------------------------------*/
    $("#inputDate").inputmask("99/99/9999", {
        "placeholder": "__/__/____"
    }); //Date Masking
    $("#inputPhone1").inputmask({
        "mask": "(999) 999-9999"
    }); //Phone Number Masking
    $("#inputPhone2").inputmask({
        "mask": "(999) 999-9999?x99999"
    }); //Exceptional Phone Number Masking
    $("#inputIntPhone").inputmask({
        "mask": "+ 999 999 999"
    }); //International Phone Number Masking
    $("#inputTaxId").inputmask({
        "mask": "99-9999999"
    }); //ITax ID Masking
    $("#inputSSN").inputmask({
        "mask": "999-99-9999"
    }); //SSN Masking
    $("#inputProductKey").inputmask({
        "mask": "a* -999-a999"
    }); //Product Key Masking
    $("#inputPercent").inputmask({
        "mask": "99%"
    }); //Percentage Masking
    $("#inputCurrency").inputmask({
        "mask": "$ 999,999,999.99"
    }); //Currency Masking

    /*--------------------------------------------
    		Form-Wizard Settings
    ---------------------------------------------*/

    var form = $("#form-wizard-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.children("div").steps({
        headerTag: ".form-wizard-circle",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        }
    });

    /*--------------------------------------------
    		Tinymce Settings
    ---------------------------------------------*/
    tinymce.init({
        selector: '.compose-box',
        height: 200,
        menubar: false,
        plugins: [
		'advlist autolink lists link image charmap print preview anchor',
		'searchreplace visualblocks code fullscreen',
		'insertdatetime media table contextmenu paste code'
	  ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | link image',

    });
    /*--------------------------------------------
    		Drag-and-drope File Settings
    ---------------------------------------------*/
    $("#fileuploader").uploadFile({
        url: "assets/file-upload",
        fileName: "myfile"
    });

    $("#fileuploader-2").uploadFile({
        url: "assets/file-upload",
        fileName: "myfile"
    });
    /*--------------------------------------------
    		SlimScroll Settings
    ---------------------------------------------*/

    $('.card-inner-block').slimScroll({
        height: '250px'
    });

    $('.accordion-menu.responsive-menu').slimScroll({
        height: "350px"
    });

    $('#chats').slimScroll({
        height: '445px'
    });

    /*--------------------------------------------
    		Chats Settings
    ---------------------------------------------*/
    function initChat() {
        var cont = $('#chats');
        var list = $('.chats', cont);
        var form = $('.chat-form', cont);
        var input = $('input', form);
        var id = $("#test");
        var btn = $('.btn', form);

        var imagePath = 'images/misc/';

        var handleClick = function (e) {
            e.preventDefault();
            var text = input.val();
            if (text.length == 0) {
                return;
            }

            var time = new Date();
            var time_str = (time.getHours() + ':' + time.getMinutes());
            var tpl = '';
            tpl += '<li class="out">';
            tpl += '<div class="message">';
            tpl += '<span class="arrow"></span>';
            tpl += '<a href="#" class="name">Bob Nilson</a>&nbsp;';
            tpl += '<span class="body">';
            tpl += text;
            tpl += '</span>';
            tpl += '</div>';
            tpl += '<div class="avatar-block">';
            tpl += '<img class="avatar" alt="" src="' + imagePath + 'avatar1.jpg"/>';
            tpl += '<span class="datetime">' + time_str + '</span>';
            tpl += '</div>';
            tpl += '</li>';
            var msg = list.append(tpl);
            input.val("");
            var getLastPostPos = function () {
                var height = 0;
                cont.find("li.out, li.in").each(function () {
                    height = height + $(this).outerHeight();
                });
                return height;
            }
            $(".emoji-wysiwyg-editor.form-control").empty();
        }

        $('body').on('click', '.message .name', function (e) {
            e.preventDefault(); // prevent click event
            var name = $(this).text(); // get clicked user's full name
            input.val('@' + name + ':'); // set it into the input field
            scrollTo(input);
        });

        btn.on('click', function () {
            handleClick();
        });
        input.on('keypress', function (e) {
            if (e.which == 13) {
                handleClick(e);
                return false; //<---- Add this line -->
            }
        });
    }
    initChat();

    /*--------------------------------------------
    		Emoji Settings
    ---------------------------------------------*/
    window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: 'images/emoji/',
        popupButtonClasses: 'fa fa-smile-o'
    });
    window.emojiPicker.discover();

    /*--------------------------------------------
    		EventCalendar Settings
    ---------------------------------------------*/
    $('#eventCalendar').fullCalendar({
        height: 300,
        contentHeight: 360,
        header: {
            left: 'prev',
            center: 'title',
            right: 'next'
        },
        defaultDate: '2017-05-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events,
        dayNamesShort: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
        events: [
            {
                title: '',
                start: '2017-05-23'
			},
            {
                title: '',
                start: '2017-05-16T16:00:00'
			},
            {
                title: '',
                start: '2017-05-10T07:00:00'
			},
            {
                title: '',
                start: '2017-05-28'
			}
		],
        eventRender: function (event, element, view) {
            var dateString = moment(event.start).format('YYYY-MM-DD');
            view.el.find('.fc-day[data-date="' + dateString + '"]').addClass('fc-has-event');
        }
    });
    /*--------------------------------------------
    		Weather-Forecast  Settings
    ---------------------------------------------*/
    $.simpleWeather({
        woeid: '2357536', //2357536
        location: '',
        unit: 'c',
        success: function (weather) {
            var d = new Date();
            var twoDigitMonth = ((d.getMonth().length + 1) === 1) ? (d.getMonth() + 1) : '0' + (d.getMonth() + 1);
            var currentDate = d.getDate() + "." + twoDigitMonth + "." + d.getFullYear();
            var html = '<div class="temparature-block eql-height-2">';
            html += '<img alt="img" src="images/weather/large-icon.png">';
            html += '<h4>Canberra, Australia</h4>';
            html += '<span>TODAY- ' + currentDate + '</span>';
            html += '<h2>' + weather.temp + '&deg;' + weather.units.temp +
                '</h2></div><div class="forcast-block eql-height-2">';
            for (var i = 1; i <= 7; i++) {
                html += '<div class="forcast">';
                html += '<p class="forcast-day">' + weather.forecast[i].day + '</p>';
                html += '<div class="forcast-icon"><img alt="img" src="images/weather/' + i + '.png"></div>';
                html += '<p class="forcast-temparature">' + weather.forecast[i].high + '&deg; /' + weather.forecast[i].low + '&deg;</p>';
                html += '</div>';
            }
            html += '</div>'
            $("#weather").html(html);
        },
        error: function (error) {
            $("#weather").html('<p>' + error + '</p>');
        }
    });
    /*--------------------------------------------
    		Lobipanel  Settings
    ---------------------------------------------*/
    $('.panel').lobiPanel({
        tooltips: true,
        draggable: true,
        reload: {
            icon: 'fa fa-refresh',
            tooltip: 'Reload'
        },
        editTitle: {
            icon: 'fa fa-edit',
            icon2: 'fa fa-save',
            tooltip: 'Edit title'
        },
        unpin: {
            icon: 'fa fa-arrows',
            tooltip: 'Unpin'
        },
        minimize: {
            icon: 'fa fa-chevron-up',
            icon2: 'fa fa-chevron-down',
            tooltip: 'Minimize'
        },
        close: {
            icon: 'fa fa-times-circle',
            tooltip: 'Close'
        },
        expand: {
            icon: 'fa fa-expand',
            icon2: 'fa fa-compress',
            tooltip: 'Fullscreen'
        }
    });

    /*--------------------------------------------
    		Column Height  Settings
    ---------------------------------------------*/

    var heights = $(".eql-height").map(function () {
            return $(this).height();
        }).get(),
        maxHeight = Math.max.apply(null, heights);
    $(".eql-height").height(maxHeight);

});
