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

// ========== NAVBAR TOGGLE ==========
let navbartoggler = document.querySelector('.navbar-toggler');
navbartoggler.onclick = function(){
    navbartoggler.classList.toggle('active')
}



