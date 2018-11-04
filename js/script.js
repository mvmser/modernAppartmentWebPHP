/*Scroll*/
$(document).ready(function() 
{
    $('.js-scroll').on('click', function() 
    {
        var page = $(this).attr('href');
        var speed = 1050; 
        $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); 
    });
});
/* End scroll */

/*ImageUpload*/
var $imageupload = $('.upload');
$imageupload.imageupload();
/* End imageUpload */
