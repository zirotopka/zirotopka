$(document).ready(function(){

	var confirmButtonText = "Да, удалить!";
    var confirmButtonRestoreText = "Да, восстановить!";
    var cancelButtonText = "Нет, отменить!";
    var confirmButtonColor = "#DD6B55";
    var confirmButtonRestoreColor = "#7cb342";
    var deleteTitle = "Вы уверены?";

	$('#users-table').on('click', '.m-user-delete', function (e) {
        e.preventDefault();
        var _this = this;
        var id = $(this).data('id');
        swal({
            title: deleteTitle,
            text: "Вы собираетесь удалить выбранного пользователя",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: confirmButtonColor,
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText,
        }).then (function () {
                $.ajax({
                    type: "DELETE",
                    url: '/admin/users/' + id,
                    success: function (data) {
                        if (data) {
                            $(_this).parentsUntil('tbody').addClass("noty_animated bounceOutRight");
                            setTimeout(function () {
                                $(_this).parentsUntil('tbody').remove();
                            }, 1000);
                            swal("Удален!", "Пользователь успешно удален.", "success");
                        }
                    },
                    error: function (data) {
                        swal("Ошибка!", "Произошла какая то ошибка!", "error");
                        console.log('Error:', data);
                        console.log('Error:', data['responseText']);
                    }
                });
            }, function (dismiss) {

        	}
        );
    });

    $('#users-table').on('click', '.m-user-status', function (e) {
        var _this_btn = $(this);
        var id = _this_btn.data('id');
        var status = _this_btn.data('status');

        swal({
            title: deleteTitle,
            text: "Вы собираетесь изменить статус пользователя",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: confirmButtonColor,
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText,
        }).then (function () {
                $.ajax({
                    type: "POST",
                    url: '/admin/change_status/' + id,
                    data: {status: status},
                    success: function (data) {
                        if (data) {
                            if (status == 1) {
                                _this_btn.text('Отключить');
                                _this_btn.data('status',0);
                                _this_btn.removeClass('btn-success');
                                _this_btn.addClass('btn-warning');
                            } else {
                                _this_btn.text('Включить');
                                _this_btn.data('status',1);
                                _this_btn.removeClass('btn-warning');
                                _this_btn.addClass('btn-success');
                            }
                            swal("Успех!", "Статус успешно изменен.", "success");
                        } else {
                            swal("Ошибка!", "Произошла какая то ошибка!", "error");
                        }
                    },
                    error: function (data) {
                        swal("Ошибка!", "Произошла какая то ошибка!", "error");
                        console.log('Error:', data);
                        console.log('Error:', data['responseText']);
                    }
                });
            }, function (dismiss) {

            }
        );
    });
})