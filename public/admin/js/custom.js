$(document).onclick(function(){
    // checking if the current admin password is correct (in the update-admin-password page)
    $("#Current_Password").keyup(function(){
        var Current_Password = $("#Current_Password").val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'post',
        url:'/admin/check-admin-password',
        data:{Current_Password:Current_Password},
        success:function(resp){
            if(resp=="false"){
                $("#check_password").html("<font color='red'>Current Password is Incorrect!</font>");
            }
            else if (resp=="true"){
                $("#check_password").html("<font color='green'>Current Password is Correct!</font>");
            }
        },
        error:function(){
            alert('Error')
        }
      });
  })
});
