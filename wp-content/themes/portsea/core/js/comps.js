$(document).ready(function() {


    if (gup("cpath") != "") {
        var qstring = '&cpath=' + gup("cpath") + '&v=' + gup("v");
        $('a').each(function(index) {
            $(this).attr('target', "_blank");
        });
        $('a[href*="comp_info"]').each(function(index) {
            $(this).attr('href', $(this).attr('href') + qstring);
            $(this).attr('target', "_self");
        });
        $('a[href*="round_info"]').each(function(index) {
            $(this).attr('href', $(this).attr('href') + qstring);
            $(this).attr('target', "_self");
        });
        $('a[href*="sgstat"]').each(function(index) {
            $(this).attr('href', $(this).attr('href') + qstring);
            $(this).attr('target', "_self");
        });
        $('.fixoptions a').each(function(index) {
            $(this).attr('href', $(this).attr('href') + qstring);
            $(this).attr('target', "_self");
        });
        $('#compselectbox').each(function(index) {
            var str = $(this).attr('onchange');
            var res = str.replace("';return", qstring + "';return");
            $(this).attr('onchange', res);
        });
        $('.roundlist select').each(function(index) {
            var str = $(this).attr('onchange');
            var res = str.replace("&rdt=", qstring + "&rdt=");
            $(this).attr('onchange', res);
        });
    }
    if (gup("cpath") != "") {

        var cssPath = c_string(gup("cpath"));

        var linkElem = document.createElement("link");
        linkElem.setAttribute("href", cssPath);
        linkElem.setAttribute("rel", "stylesheet");
        document.getElementsByTagName("head")[0].appendChild(linkElem);

        var viewWindow = "content";
        var extraD = 0;
        var extraW = 80;
        if (gup("v") == "z") {
            viewWindow = "content";
            extraD = 70;
        } else {
            extraD = 200;
            $("#content").prepend($("#topadheader"));
            document.getElementById('content').appendChild(document.getElementById('f-lb-small'));
            $("#col-3-wrap").hide();
        }

        setTimeout(function() {

            var h = document.getElementById(viewWindow).offsetHeight + extraD;
            var w = document.getElementById(viewWindow).offsetWidth + extraW;
            var t = document.getElementById(viewWindow).offsetTop;
            var json = '{  "height": "' + h + '", "width": "' + w + '", "top": "' + t + '" }';
            parent.postMessage(json, '*');
            //    console.log(json);
        }, 500);

    }

    if (gup("a") == "PLAYBYPLAY") {
        $('#playbyplay_wrap').hide();
        $('#playbyplay_wrap').css("height", "800px");


        fLinkUrl = "http://fnz.fspdev.com/aggro-fixture/" + gup("fixture") + "/";
        console.log(fLinkUrl);

        jQuery.ajax({
            url: fLinkUrl,
            context: document.body,
            success: function(resultURL) {

                var fURL = resultURL;

                jQuery.ajax({
                    url: fURL,
                    context: document.body,
                    success: function(result) {
                        $('#playbyplay_wrap').show();
                        jQuery('#playbyplay_wrap').html(result);


                        var viewWindow = "content";
                        var extraD = 0;
                        var extraW = 80;
                        if (gup("v") == "z") {
                            viewWindow = "content";
                            extraD = 70;
                        } else {
                            extraD = 200;
                            $("#content").prepend($("#topadheader"));
                            document.getElementById('content').appendChild(document.getElementById('f-lb-small'));
                            $("#col-3-wrap").hide();
                        }

                        setTimeout(function() {

                            var h = document.getElementById(viewWindow).offsetHeight + extraD;
                            var w = document.getElementById(viewWindow).offsetWidth + extraW;
                            var t = document.getElementById(viewWindow).offsetTop;
                            var json = '{  "height": "' + h + '", "width": "' + w + '", "top": "' + t + '" }';
                            parent.postMessage(json, '*');
                            //    console.log(json);
                        }, 500);

                    }
                });
                setInterval(function() {
                    jQuery.ajax({
                        url: fURL,
                        context: document.body,
                        success: function(result) {
                            jQuery('#playbyplay_wrap').html(result);
                        }
                    })
                }, 10000);

            }
        })

    }


});

function c_string(data) {

    var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
        ac = 0,
        dec = '',
        tmp_arr = [];

    if (!data) {
        return data;
    }

    data += '';

    do {
        // unpack four hexets into three octets using index points in b64
        h1 = b64.indexOf(data.charAt(i++));
        h2 = b64.indexOf(data.charAt(i++));
        h3 = b64.indexOf(data.charAt(i++));
        h4 = b64.indexOf(data.charAt(i++));

        bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;

        o1 = bits >> 16 & 0xff;
        o2 = bits >> 8 & 0xff;
        o3 = bits & 0xff;

        if (h3 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1);
        } else if (h4 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1, o2);
        } else {
            tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
        }
    } while (i < data.length);

    dec = tmp_arr.join('');

    return decodeURIComponent(escape(dec.replace(/\0+$/, '')));
}

function gup(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.href);
    if (results == null)
        return "";
    else
        return results[1];
}

// display the lightbox
function lightbox(insertContent, ajaxContentUrl) {

    (function($) {

        // add lightbox/shadow <div/>'s if not previously added
        if ($('#lightbox').size() == 0) {
            var theLightbox = $('<div id="lightbox"/>');
            var theShadow = $('<div id="lightbox-shadow"/>');
            var theCloser = $('<div id="lightbox-closer"/>');

            $('body').append(theShadow);
            $(theShadow).append(theCloser);
            $(theShadow).append(theLightbox);
            $('body').css('overflow', 'hidden');
            $(theShadow).click(function(e) {
                closeLightbox();
            });
            $(theLightbox).click(function(e) {
                e.stopPropagation();
            });
            $(theCloser).click(function(e) {
                closeLightbox();
            });
        }

        // remove any previously added content
        $('#lightbox').empty();

        // insert HTML content
        if (insertContent != null) {
            $('#lightbox').append(insertContent);
        }

        // insert AJAX content
        if (ajaxContentUrl != null) {
            // temporarily add a "Loading..." message in the lightbox
            $('#lightbox').append('<p class="loading">Loading...</p>');

            // request AJAX content
            $.ajax({
                type: 'GET',
                url: ajaxContentUrl,
                success: function(data) {
                    // remove "Loading..." message and append AJAX content
                    $('#lightbox').empty();
                    $('#lightbox').append(data);
                },
                error: function() {
                    alert('AJAX Failure!');
                }
            });
        }

        // move the lightbox to the current window top + 100px
        $('#lightbox').css('top', $(window).scrollTop() + 100 + 'px');

        // display the lightbox
        $('body').css('overflow', 'hidden');
        $('#lightbox').show();
        $('#lightbox-shadow').show();


    })(jQuery);

}

// close the lightbox
function closeLightbox() {

    (function($) {

        // hide lightbox/shadow <div/>'s
        $('body').css('overflow', 'auto');
        $('#lightbox').hide();
        $('#lightbox-shadow').hide();

        // remove contents of lightbox in case a video or other content is actively playing
        $('#lightbox').empty();

    })(jQuery);
}

function keepOpen() {

    (function($) {

        // hide lightbox/shadow <div/>'s
        $('#lightbox').show();
        $('#lightbox-shadow').show();

    })(jQuery);
}