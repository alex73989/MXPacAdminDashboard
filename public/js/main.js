$base_url = "http://localhost/MXPacGroup";

// ========== LEFT SIDEBAR JS ==========

$(document).on('click', '#sidebar li', function(){
    $(this).addClass('active').siblings().removeClass('active')
});

// ========== LEFT MENU SIDEBAR DP TOGGLE ==========
$('.sub-menu ul').hide();
$(".sub-menu a").click(function(){
    $(this).parent(".sub-menu").children("ul").slideToggle("100");
    $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});

// ========== SIDEBAR TOGGLE ==========
$(document).ready(function(){
    $("#toggleSidebar").click(function(){
        $(".left-menu").toggleClass("hide");
        $(".content-wrapper").toggleClass("hide");
    });
});

// ========== ADD EMPLOYEE RECORDS ==========
$(document).on("click", "#add", function(e){
    e.preventDefault();

    var employeeid = $("employeeid").val();
    var username = $("#username").val();
    var fullname = $("#fullname").val();
    var mobile = $("#mobile").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var cardid = $("#cardid").val();
    var usergroup = $("#usergroup").val();
    var groupdescription = $("#groupdescription").val();

    if(employeeid == "" || username == "" || fullname == ""
    || mobile == "" || email == "" || password == "" 
    || cardid == "" || usergroup == "" || groupdescription == "")
    {
        alert("All Field is Required")
    }
    else
    {
        console.log(""),
        $.ajax({
            url: $base_url + "/insert",
            type: 'post',
            data: {
                employeeid: employeeid,
                username: username,
                fullname: fullname,
                mobile: mobile,
                email: email,
                password: password,
                cardid: cardid,
                usergroup: usergroup,
                groupdescription: groupdescription

            },
            success: function(data){
                console.log(data);
            }
        });
    }

});