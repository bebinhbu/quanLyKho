 $(document).ready(function () {
     if($('.providerPage').length > 0) {
         var isUpdatingPeriod = false;
         $(".btnEditPro").click(function () {
             if (isUpdatingPeriod) {
                 return false;
             }
             var parent = $(this).closest('tr');
             var id = parent.find('.id_pro').html();
             var name = parent.find('.name_pro').val();
             var address = parent.find('.address_pro').val();
             var phone = parent.find('.phone_pro').val();
             var postData = {
                     '_token': $('meta[name="csrf-token"]').attr('content'),
                     'id': id,
                     'name': name,
                     'address': address,
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
                         $.alert({
                             title: '<h2 style="color:green;font-weight: bold">Success!</h2>',
                             content: 'Update Provider Success!'
                         });
                     }
                     else {
                         $.alert({
                             title: '<h2 style="color:red;font-weight: bold">Fail!</h2>',
                             content: 'Update Provider Fail Because ' + data.errors
                         });
                     }
                 },
                 complete: function () {
                     isUpdatingPeriod = false;
                 }
             });
         });
         $('.btnDeletePro').click(function () {
             var _this = this;

             $.confirm({
                 title: 'Delete!',
                 content: 'Are you sure delete it!',
                 buttons: {
                     OK: function () {
                         location.href = $(_this).attr('href');
                     },
                     Cancel: function () {

                     }
                 }
             });
             return false;
         })
         $('#bulk_delete').click(function () {
             var id = [];
             $.confirm({
                 title: 'Delete!',
                 content: 'Are you sure delete it!',
                 buttons: {
                     OK: function () {
                         $('.checkboxes:checked').each(function () {
                             id.push($(this).val());
                         });
                         var postData = {
                             '_token': $('meta[name="csrf-token"]').attr('content'),
                             'id': id
                         }
                         if (id.length > 0) {
                             $.ajax({
                                 url: $("#bulk_delete").attr('data-url'),
                                 method: "POST",
                                 data: postData,
                                 success: function (data) {
                                     if (data.success) {
                                         window.location.reload();
                                     }
                                 }
                             });

                         }
                     },
                     Cancel: function () {

                     }
                 }
             });
             return false;
         })
     }
 });