$(document).ready(function(){

	var confirmButtonText = "Да, удалить!";
    var confirmButtonRestoreText = "Да, восстановить!";
    var cancelButtonText = "Нет, отменить!";
    var confirmButtonColor = "#DD6B55";
    var confirmButtonRestoreColor = "#7cb342";
    var deleteTitle = "Вы уверены?";

	jQuery('#users-table').on('click', '.m-user-delete', function (e) {
        e.preventDefault();
        var _this = this;
        var id = jQuery(this).data('id');
        swal({
            title: deleteTitle,
            text: "Вы собираетесь удалить выбранного пользователя",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: confirmButtonColor,
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText,
        }).then (function () {
                jQuery.ajax({
                    type: "DELETE",
                    url: '/admin/users/' + id,
                    success: function (data) {
                        if (data) {
                            jQuery(_this).parentsUntil('tbody').addClass("noty_animated bounceOutRight");
                            setTimeout(function () {
                                jQuery(_this).parentsUntil('tbody').remove();
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
})