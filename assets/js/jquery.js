$(document).ready(function ()
{
    $('#first_name_error').hide();
    $('#last_name_error').hide();
    $('#datepicker_error').hide();
    $('#email_error').hide();
    $('#password_error').hide();
    $('#cpassword_error').hide();
    $('#profile_error').hide();
    $('#captcha_error').hide();
    var fname_error = true;
    var lname_error = true;
    var date_error = true;
    var mail_error = true;
    var pass_error = true;
    var cpass_error = true;
    var upload_error = true;
    var capt_error = true;
    $('#first_name').blur(function ()
    {
        firstname_check();

    });
    $(function () {
        $('#first_name').keydown(function (e) {
            if (e.shiftKey || e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });
    });
    function firstname_check() {
        var fname_val = $('#first_name').val();
        if (fname_val.length == '') {
            $('#first_name_error').show();
            $('#first_name_error').html("**Please fill first name");
            $('#first_name_error').focus();
            $('#first_name_error').css("color", "red");
            fname_error = false;
            return false;
        } else {
            $('#first_name_error').hide();
        }
        if ((fname_val.length < 3) || (fname_val.length > 20)) {
            $('#first_name_error').show();
            $('#first_name_error').html("**First name length must be between 3 and 20");
            $('#first_name_error').focus();
            $('#first_name_error').css("color", "red");
            fname_error = false;
            return false;
        } else {
            $('#first_name_error').hide();
        }
    }
    $('#last_name').blur(function ()
    {
        lastname_check();

    });
    $(function () {
        $('#last_name').keydown(function (e) {
            if (e.shiftKey || e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });
    });
    function lastname_check()
    {
        var lname_val =$('#last_name').val();
        if(lname_val.length == '')
        {
            $('#last_name_error').show();
            $('#last_name_error').html("**Please fill last name");
            $('#last_name_error').focus();
            $('#last_name_error').css("color","red");
            lname_error=false;
            return false;
        }
        else
        {
            $('#last_name_error').hide();
        }
        if((lname_val.length < 3 )|| (lname_val.length > 20 ))
        {
            $('#last_name_error').show();
            $('#last_name_error').html("**Last name length must be between 3 and 20");
            $('#last_name_error').focus();
            $('#last_name_error').css("color","red");
            lname_error=false;
            return false;
        }
        else
        {
            $('#last_name_error').hide();
        }
    }
    $('#datepicker').change(function ()
    {
        datepicker_check();
    });
    function datepicker_check()
    {
        var datepicker_val =$('#datepicker').val();
        if(datepicker_val.length == '')
        {
            $('#datepicker_error').show();
            $('#datepicker_error').html("**Please fill date of birth");
            $('#datepicker_error').focus();
            $('#datepicker_error').css("color","red");
            date_error=false;
            return false;
        }
        else
        {
            $('#datepicker_error').hide();
        }
        var fromDate = new Date($("#datepicker").val());
        var date = new Date(fromDate).toDateString("yyyy-MM-dd");
    }
    $('#email').keyup(function ()
    {
        email_check();
    });
    function email_check()
    {
        var email_val =$('#email').val();
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!(mailformat.test(email_val)))
        {
            $('#email_error').show();
            $('#email_error').html("**Please Enter valid Email Id.");
            $('#email_error').focus();
            $('#email_error').css("color","red");
            mail_error=false;
            return false;
        }
        else
        {
            $('#email_error').hide();
        }
    }
    $('#password').blur(function ()
    {
        password_check();
    });
    function  password_check()
    {
        var password_val =$('#password').val();
        var pattern = /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/;
        if(password_val.length == '')
        {
            $('#password_error').show();
            $('#password_error').html("**Please Enter Password");
            $('#password_error').focus();
            $('#password_error').css("color","red");
            pass_error=false;
            return false;
        }
        else
        {
            $('#password_error').hide();
        }
        if(pattern.test(password_val))
        {
            $('#password_error').hide();

        }
        else
        {
            $('#password_error').show();
            $('#password_error').html("**Minimum eight characters, at least one letter, one number and one special character");
            $('#password_error').focus();
            $('#password_error').css("color","red");
            pass_error=false;
            return false;
        }
    }
    $('#password_confirmation').blur(function ()
    {
        confirm_password_check();
    });
    function confirm_password_check()
    {
        var cpassword_val =$('#password_confirmation').val();
        var password_val =$('#password').val();
        if(password_val != cpassword_val)
        {
            $('#cpassword_error').show();
            $('#cpassword_error').html("**Password are not matching");
            $('#cpassword_error').focus();
            $('#cpassword_error').css("color","red");
            cpass_error=false;
            return false;
        }
        else
        {
            $('#cpassword_error').hide();
        }
    }
    $('#profile').change(function ()
    {
        profile_check();
    });
    function profile_check()
    {
        var profile_val =$('#profile').val();
        if(profile_val.length == '')
        {
            $('#profile_error').show();
            $('#profile_error').html("**Select your profile");
            $('#profile_error').focus();
            $('#profile_error').css("color","red");
            upload_error=false;
            return false;
        }
        else
        {
            $('#profile_error').hide();
        }
    }
    $('#captcha').keyup(function ()
    {
        captcha_check();
    });
    function captcha_check()
    {
        var captcha_val =$('#captcha').val();
        var random_val =$('#ran').text();
        if(captcha_val.length == '')
        {
            $('#captcha_error').show();
            $('#captcha_error').html("**Please enter captcha code");
            $('#captcha_error').focus();
            $('#captcha_error').css("color","red");
            capt_error=false;
            return false;
        }
        else
        {
            $('#captcha_error').hide();
        }
        if(random_val != captcha_val)
        {
            $('#captcha_error').show();
            $('#captcha_error').html("**Captcha code not match");
            $('#captcha_error').focus();
            $('#captcha_error').css("color","red");
            capt_error=false;
            return false;
        }
        else
        {
            $('#captcha_error').hide();
        }
    }
    $('#register').click(function ()
    {
        fname_error = true;
        lname_error = true;
        date_error  = true;
        mail_error  = true;
        pass_error  = true;
        cpass_error = true;
        upload_error = true;
        capt_error = true;
        firstname_check();
        lastname_check();
        datepicker_check();
        email_check();
        password_check();
        confirm_password_check();
        profile_check();
        captcha_check();
        if((fname_error == true) && (lname_error == true) && (date_error == true) && (mail_error == true) && (pass_error == true) && (cpass_error == true) && (upload_error == true ) && (capt_error == true ))
        {
            return true;
        }
        else
        {
            return false;
        }
    });
    $('#update').click(function ()
    {
        fname_error = true;
        lname_error = true;
        date_error  = true;
        mail_error  = true;
        pass_error  = true;
        cpass_error = true;
        firstname_check();
        lastname_check();
        datepicker_check();
        email_check();
        password_check();
        confirm_password_check();
        if((fname_error == true) && (lname_error == true) && (date_error == true) && (mail_error == true) && (pass_error == true) && (cpass_error == true))
        {
            return true;
        }
        else
        {
            return false;
        }
    });
});
$(document).ready(function () {
    var today = new Date();
    $('#datepicker').datepicker({
        format: 'mm-dd-yyyy',
        autoclose:true,
        endDate: "today",
        maxDate: today
    }).on('changeDate', function () {
        $(this).datepicker('hide');
    });
    $('#datepicker').keyup(function () {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9^-]/g, '');
        }
    });
});
function editmember(id=null) {
    if(id) {
        $.ajax({
            type:'POST',
            url:'updatemodal.php',
            data: {id:id},
            success:function (response) {
                var user= JSON.parse(response);
                $("#logo").attr("src", "images/"+user.profile);
                $("#userid").val(user.id);
                $("#firstname").val(user.firstname);
                $("#lastname").val(user.lastname);
                $("#dob").val(user.dob);
                $("#email").val(user.email);
                $("#password").val(user.password);
                $("#confirmpassword").val(user.confirmpassword);
                $("#city").val(user.city);
                $("#profile").val(user.profile);
                $("#editEmployeeModal").modal('show');
            }
        });
    }else{
        alert("Error");
    }
}
$(document).ready(function ()
{
    $('#first_name_error').hide();
    $('#last_name_error').hide();
    $('#datepicker_error').hide();
    $('#email_error').hide();
    $('#password_error').hide();
    $('#cpassword_error').hide();
    $('#profile_error').hide();
    var fname_error = true;
    var lname_error = true;
    var date_error = true;
    var mail_error = true;
    var pass_error = true;
    var cpass_error = true;
    var upload_error = true;
    $('#firstname').blur(function ()
    {
        firstname_check();
    });
    function firstname_check()
    {
        var firstname =$('#firstname').val();
        if(firstname.length == '')
        {
            $('#first_name_error').show();
            $('#first_name_error').html("**Please fill first name");
            $('#first_name_error').focus();
            $('#first_name_error').css("color","red");
            fname_error=false;
            return false;
        }
        else
        {
            $('#first_name_error').hide();
        }
        if((firstname.length < 3 )|| (firstname.length > 20 ))
        {
            $('#first_name_error').show();
            $('#first_name_error').html("**First name length must be between 3 and 20");
            $('#first_name_error').focus();
            $('#first_name_error').css("color","red");
            fname_error=false;
            return false;
        }
        else
        {
            $('#first_name_error').hide();
        }
    }
    $('#lastname').blur(function ()
    {
        lastname_check();
    });
    function lastname_check()
    {
        var lastname =$('#lastname').val();
        if(lastname.length == '')
        {
            $('#last_name_error').show();
            $('#last_name_error').html("**Please fill last name");
            $('#last_name_error').focus();
            $('#last_name_error').css("color","red");
            lname_error=false;
            return false;
        }
        else
        {
            $('#last_name_error').hide();
        }
        if((lastname.length < 3 )|| (lastname.length > 20 ))
        {
            $('#last_name_error').show();
            $('#last_name_error').html("**Last name length must be between 3 and 20");
            $('#last_name_error').focus();
            $('#last_name_error').css("color","red");
            lname_error=false;
            return false;
        }
        else
        {
            $('#last_name_error').hide();
        }
    }
    $('#dob').blur(function ()
    {
        datepicker_check();
    });
    function datepicker_check()
    {
        var datepicker_val =$('#dob').val();
        if(datepicker_val.length == '')
        {
            $('#datepicker_error').show();
            $('#datepicker_error').html("**Please fill date of birth");
            $('#datepicker_error').focus();
            $('#datepicker_error').css("color","red");
            date_error=false;
            return false;
        }
        else
        {
            $('#datepicker_error').hide();
        }
        var fromDate = new Date($("#dob").val());
        var date = new Date(fromDate).toDateString("yyyy-MM-dd");
    }
    $('#email').keyup(function ()
    {
        email_check();
    });
    function email_check()
    {
        var email =$('#email').val();
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!(mailformat.test(email)))
        {
            $('#email_error').show();
            $('#email_error').html("**Please Enter valid Email Id.");
            $('#email_error').focus();
            $('#email_error').css("color","red");
            mail_error=false;
            return false;
        }
        else
        {
            $('#email_error').hide();
        }
    }
    $('#password').blur(function ()
    {
        password_check();
    });
    function  password_check()
    {
        var password =$('#password').val();
        var pattern = /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/;
        if(password.length == '')
        {
            $('#password_error').show();
            $('#password_error').html("**Please Enter Password");
            $('#password_error').focus();
            $('#password_error').css("color","red");
            pass_error=false;
            return false;
        }
        else
        {
            $('#password_error').hide();
        }
        if(pattern.test(password))
        {
            $('#password_error').hide();

        }
        else
        {
            $('#password_error').show();
            $('#password_error').html("**Minimum eight characters, at least one letter, one number and one special character");
            $('#password_error').focus();
            $('#password_error').css("color","red");
            pass_error=false;
            return false;
        }
    }
    $('#confirmpassword').blur(function ()
    {
        confirm_password_check();
    });
    function confirm_password_check()
    {
        var confirmpassword =$('#confirmpassword').val();
        var password =$('#password').val();
        if(password != confirmpassword)
        {
            $('#cpassword_error').show();
            $('#cpassword_error').html("**Password are not matching");
            $('#cpassword_error').focus();
            $('#cpassword_error').css("color","red");
            cpass_error=false;
            return false;
        }
        else
        {
            $('#cpassword_error').hide();
        }
    }
    function profile_check()
    {
        var profile =$('#profile').val();
        if(profile.length == '')
        {
            $('#profile_error').show();
            $('#profile_error').html("**Select your profile");
            $('#profile_error').focus();
            $('#profile_error').css("color","red");
            upload_error=false;
            return false;
        }
        else
        {
            $('#profile_error').hide();
        }
    }
    $('#upload').click(function ()
    {

        upload_error = true;
        profile_check();
        if(upload_error == true )
        {
            var fd = new FormData($("#edituser_form"));
            alert(fd);
            var user_id = $('#userid').val();
            var profile=$('#profile').val();
            $.ajax({
                type:'GET',
                url:'upload_image.php',
                data: {
                    user_id:user_id,
                    profile:profile,fd
                },
                success:function (response) {
                    alert(response);
                    //$("#editEmployeeModal").modal('show');
                    // window.location.reload();
                }
            });
        }
        else
        {
            return false;
        }
    });
    $('#updateuserval').click(function ()
    {
        fname_error = true;
        lname_error = true;
        date_error  = true;
        mail_error  = true;
        pass_error  = true;
        cpass_error = true;
        firstname_check();
        lastname_check();
        datepicker_check();
        email_check();
        password_check();
        confirm_password_check();
        if((fname_error == true) && (lname_error == true) && (date_error == true) && (mail_error == true) && (pass_error == true) && (cpass_error == true))
        {
            var user_id = $('#userid').val();
            var firstname=$('#firstname').val();
            var lastname=$('#lastname').val();
            var dob=$('#dob').val();
            var email=$('#email').val();
            var password=$('#password').val();
            var confirmpassword=$('#confirmpassword').val();
            var city=$('#city').val();
            var profile=$('#profile').val();
            $.ajax({
                type:'POST',
                url:'updateuser.php',
                data: {
                    user_id:user_id,
                    firstname:firstname,
                    lastname:lastname,
                    dob:dob,
                    email:email,
                    password:password,
                    confirmpassword:confirmpassword,
                    city:city,
                    profile:profile
                },
                success:function (response) {
                    $("#editEmployeeModal").modal('hide');
                    window.location.reload();
                }
            });
        }
        else
        {
            return false
        }
    });

    $('#deleteEmployeeModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $('#delete').click(function () {
           // alert('hello');
            $.ajax({
            type:'POST',
            url:'deleteuser.php',
            data:{id:rowid},
            success:function (response) {
                 $("#deleteEmployeeModal").modal('hide');
                 window.location.reload();
            }
            });
        })
    });

});
function mycaptcha()
{
    $.ajax({
        url:'captcha/captcha.php',
        type:'get',
        data:{id:1},
        success:function (response) {
            $('#random').html(response);
        }
    });
}
