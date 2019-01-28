$(document).ready(function () {
    $('.text-field').change(function () {
        var myusername = $('.text-field').val();
 
        $.ajax({
            type: "POST",
            url: "http://localhost/rimasphp/mvc/index.php/posts/test/",
            data: {myusername: myusername},
            cache: false,
            success: function (data) {
                $("#resultarea").text(data)
                $('body').css('background-color','red')
                $('.resultarea').css('text-align','center')
            }
        })
    });
 });