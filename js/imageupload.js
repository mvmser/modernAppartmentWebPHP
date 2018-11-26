(function($) {
    'use strict';

    var options = {};

    var methods = {
        init: init
    };

    $.fn.imageupload = function(methodOrOptions) {
        var givenArguments = arguments;

        return this.filter('div').each(function() {
            if (methods[methodOrOptions]) {
                methods[methodOrOptions].apply($(this), Array.prototype.slice.call(givenArguments, 1));
            }
            else if (typeof methodOrOptions === 'object' || !methodOrOptions) {
                methods.init.apply($(this), givenArguments);
            }
          
        });
    };

    $.fn.imageupload.defaultOptions = {
        allowedFormats: [ 'jpg', 'jpeg', 'png', 'gif' ],
        maxWidth: 250,
        maxHeight: 250,
        maxFileSizeKb: 2048
    };

    function init(givenOptions) {
        options = $.extend({}, $.fn.imageupload.defaultOptions, givenOptions);

        var $imageupload = this;
        var $urlTab = $imageupload.find('.url-tab');
        var $submitUrlButton = $urlTab.find('.btn:eq(1)');
        
        
        $submitUrlButton.off();

        $submitUrlButton.on('click', function() {
            $(this).blur();
            submitImageUrl($urlTab);
        });     
    }

    function getAlertHtml(message) {
        var html = [];
        html.push('<div class="alert alert-danger alert-dismissible">');
        html.push('<button type="button" class="close" data-dismiss="alert">');
        html.push('<span>&times;</span>');
        html.push('</button>' + message);
        html.push('</div>');
        return html.join('');
    }

    function getImageThumbnailHtml(src) {
        return '<img src="' + src + '" alt="Image preview" class="thumbnail" style="margin: 1%; max-width: ' + options.maxWidth + 'px; max-height: ' + options.maxHeight + 'px">';
    }

    function getFileExtension(path) {
        return path.substr(path.lastIndexOf('.') + 1).toLowerCase();
    }

    function isValidImageUrl(url, callback) {
        var image = new Image();

        image.onload = function() {

                // Strip querystring (and fragment) from URL.
                var tempUrl = url;
                if (tempUrl.indexOf('?') !== -1) {
                    tempUrl = tempUrl.split('?')[0].split('#')[0];
                }

                // Check image format by file extension.
                var fileExtension = getFileExtension(tempUrl);
                if ($.inArray(fileExtension, options.allowedFormats) > -1) {
                    callback(true, 'Image URL is valid.');
                }
                else {
                    callback(false, 'File type is not allowed.');
                }
            
        };
        

        image.onerror = function() {
                callback(false, 'Image could not be found.');
        };

        image.src = url;       
    }

    function submitImageUrl($urlTab) {
        var $urlInput = $urlTab.find('input[type="text"]');
        var $submitUrlButton = $urlTab.find('.btn:eq(0)');

        $urlTab.find('.alert').remove();
        $urlTab.find('img').remove();

        var url = $urlInput.val();
        if (!url) {
            $urlTab.prepend(getAlertHtml('Please enter an image URL.'));
            return;
        }

        isValidImageUrl(url, function(isValid, message) {
            if (isValid) {
                // Submit URL value.
                $urlTab.find('input[type="hidden"]').val(url);

                // Show thumbnail and remove button.
                $(getImageThumbnailHtml(url)).insertAfter($submitUrlButton.closest('.input-group'));
            }
            else {
                $urlTab.prepend(getAlertHtml(message));
            }

        });
    }
}(jQuery));