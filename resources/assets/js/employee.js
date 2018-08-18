$(document).ready(function () {
    var isUpdatingPeriod = false;
    $(".btnEditEmp").click(function () {
        if (isUpdatingPeriod) {
            return false;
        }
        var parent = $(this).closest('tr');
        var id = parent.find('.id_emp').html();
        var name = parent.find('.name_emp').val();
        var sex = parent.find('.sex').val();
        var email = parent.find('.email_emp').val();
        var phone = parent.find('.phone_emp').val();
        var postData = {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id,
                'name': name,
                'sex': sex,
                'email': email,
                'phone': phone
            },
            isUpdatingPeriod = true;
        var url = $(this).attr('data-url');
        $.ajax({
            url: url,
            type: 'POST',
            data: postData,
            success: function (data) {
                if (data.success) {
                    // alert('Update Employee Success !!');
                    $.alert({
                        title: '<h2 style="color:green;font-weight: bold">Success!</h2>',
                        content: 'Update Employee Success!'
                    });
                }
                else {
                    // alert('Update Employee Fail !' + data.errors);
                    $.alert({
                        title: '<h2 style="color:red;font-weight: bold">Fail!</h2>',
                        content: 'Update Employee Fail because' + data.errors
                    });
                }
            },
            complete: function () {
                isUpdatingPeriod = false;
            }
        });
    });
    $('.btnDeleteEmp').click(function(){
        var _this = this;

        $.confirm({
            title: 'Delete!',
            content: 'Are you sure delete it!',
            buttons: {
                OK: function(){
                    location.href = $(_this).attr('href');
                },
                Cancel :function()
                {

                }
            }
        });
        return false;
    })
    $('#bulk_delete').click(function(){
        var id=[];
        $.confirm({
            title: 'Delete!',
            content: 'Are you sure delete it!',
            buttons: {
                OK: function(){
                    $('.checkboxes:checked').each(function(){
                        id.push($(this).val());
                    });
                    var postData = {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id' : id
                    }
                    if(id.length > 0)
                    {
                        $.ajax({
                            url: $("#bulk_delete").attr('data-url'),
                            method: "POST",
                            data:postData,
                            success:function(data){
                                if(data.success)
                                {
                                    window.location.reload();
                                }
                            }
                        });

                    }
                },
                Cancel :function()
                {

                }
            }
        });
        return false;
    })
});