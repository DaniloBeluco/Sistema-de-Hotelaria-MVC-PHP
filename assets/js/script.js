
$(document).ready(function () {
    $("#cpf").mask("999.999.999-99");
    $("#telefone").mask("(99) 9999-9999");
    $("#checkin").mask("99/99/9999");
    $("#checkout").mask("99/99/9999");

    var a = 0;
    $('.fechar-left-menu').bind('click', function () {
        $('.fechar-left-menu').css('transform', 'rotate(90deg)');
        if (a == 0) {
            $('.left-menu').toggle('low');
            $('.fechar-left-menu').html('Abrir Menu');
            $('.fechar-left-menu').animate({'margin-left': -80},
            {duration: 400,
                step: function () {
                    $('.fechar-left-menu').css('width', '20px');
                }
            });
            $('.calendario').css('width', '100%');
            $('.quartos-container').css('width', '100%');
            $('.cliente-container-content').css('width', '100%');
            $('.adicionar-container').css('width', '71%');
            $('.adicionar-reserva').css('margin-right', '30%');

            a = 1;
        } else {
            $('.fechar-left-menu').css('transform', 'rotate(0deg)');
            $('.left-menu').toggle('low');
            $('.fechar-left-menu').html('Fechar Menu');
            $('.fechar-left-menu').animate({'margin-left': 0},
            {duration: 400,
                step: function () {
                    $('.fechar-left-menu').css('width', '100%');
                }
            });
            $('.calendario').css('width', '80%');
            $('.quartos-container').css('width', '80%');
            $('.cliente-container-content').css('width', '80%');
            $('.adicionar-container').css('width', '52%');
            $('.adicionar-reserva').css('margin-right', '24%');

            a = 0;
        }
    });

    $('.td-view').mouseover(function () {
        $(this).addClass('td-hover');
    });
    $('.td-view').mouseout(function () {
        $(this).removeClass('td-hover');
    });

    $('.td-view').click(function () {
        $('td').attr('style', 'background:transparent');
        var data = $(this).text();
        $(this).attr('style', 'background:#80a3ad;color:white');

        $.ajax({
            url: 'http://localhost/dan_hotel_MVC/ajax',
            type: 'POST',
            data: {data: data},
            success: function (html) {
                $('.calendario-reservas').html(html);
            }
        });
    });


});

