const menu = document.querySelectorAll('.menu')[0];
const nav = document.querySelectorAll('.nav')[0];
let check_menu = true;

menu.addEventListener('click',  () =>{
    if(check_menu){
        nav.style.top = "100%";
        check_menu = !check_menu;
    }else {
        nav.style.top = "-150%";
        check_menu = !check_menu;
    }
});