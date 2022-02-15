
 $(document).ready(function(){

              $("#alert-basic").click(function(){
                  swal("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis");
              });

              $("#alert-title").click(function(){
                  swal("Here's the title!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis");
              });

              $("#alert-success").click(function(){
                  swal("Good job!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis", "success");
              });

              $("#alert-error").click(function(){
                  swal("Somthing Wrong!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis,", "error");
              });

              $("#alert-info").click(function(){
                  swal("Information!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis,", "info");
              });

              $("#alert-warning").click(function(){
                  swal("Warning!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis,", "warning");
              });


            //   $("#confirm-btn-alert").click(function(){

            //       swal({
            //         title: "Are you sure?",
            //         text: "Once deleted, you will not be able to recover this imaginary file!",
            //         icon: "warning",
            //         buttons: true,
            //         dangerMode: true,
            //       })
            //       .then((willDelete) => {
            //         if (willDelete) {
            //           swal("Poof! Your imaginary file has been deleted!", {
            //             icon: "success",
            //           });
            //         } else {
            //           swal("Your imaginary file is safe!");
            //         }
            //       });

            //   });

              $(document).on('click', '#confirm-btn-alert', function (e) {
                var that = $(this)
                e.preventDefault();
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this imaginary file!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                // let url = that.closest('form').attr('action');
                // let data = new FormData(that.closest('form').get(0));
                // $.ajax({
                //     url: url,
                //     data: data,
                //     method: 'post',
                //     processData: false,
                //     contentType: false,
                //     cache: false,
                //     success: function (response) {
                //         if (response) {
                //             swal("Poof! Your imaginary file has been deleted!", {
                //             icon: "success",
                //             $('.datatable').DataTable().ajax.reload();
                //             });
                //         } else {
                //             swal("Your imaginary file is safe!");
                //         }
                //     },
                // });
                // end of ajax call
                .then((willDelete) => {
                  if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        });
                  } else {
                    swal("Your imaginary file is safe!");
                  }
                });

            });



              //delete notty movie course
        $(document).on('click', '.delete', function (e) {
            var that = $(this)
            e.preventDefault();

            var n = new Noty({
                text: "Are you sure?",
                type: "alert",
                killer: true,
                buttons: [
                    Noty.button("Yes", 'btn btn-success mr-2', function () {
                        let url = that.closest('form').attr('action');
                        let data = new FormData(that.closest('form').get(0));

                        let loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i>';
                        let originalText = that.html();
                        that.html(loadingText);
                        n.close();
                        $.ajax({
                            url: url,
                            data: data,
                            method: 'post',
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function (response) {
                                // $("#record__select-all").prop("checked", false);
                                $('.datatable').DataTable().ajax.reload();
                                new Noty({
                                    layout: 'topRight',
                                    type: 'alert',
                                    text: response,
                                    killer: true,
                                    timeout: 2000,
                                }).show();
                                that.html(originalText);
                            },
                        });//end of ajax call

                    }),
                    Noty.button("No", 'btn btn-danger mr-2', function () {
                        n.close();
                    })
                ]
            });
            n.show();

        });//end of delete

          });
