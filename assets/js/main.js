// $(".menu-active").click(function(e){
//     const targetMenu = e.target;
//     $.ajax({url: "demo_test.txt", success: function(result){
//       $("#div1").html(result);
//     }});
//   });









//active sidebar
const menu = document.querySelector(".menu-active")
menu.addEventListener("click", function (e) {
    const targetMenu = e.target;
    if (targetMenu.classList.contains("nav-link")) {
        const menuLinkActive = document.querySelector("ul li a.active");
        if (
            menuLinkActive !== null &&
            targetMenu.getAttribute("href") !==
                menuLinkActive.getAttribute("href")
        ) {
            menuLinkActive.classList.remove("active");
            console.log("oke gass")
        }
        targetMenu.classList.add("active");
        console.log(no)
    }
});


