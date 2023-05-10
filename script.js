let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
let nav = document.querySelector('.header .nav');
let accountBox = document.querySelector('.header .account-box');

document.querySelector('#menu-btn').onclick = () =>{
    console.log('Menu button clicked!');
    navbar.classList.toggle('active');
    accountBox.classList.remove('active');
 }
document.querySelector('#user-btn').onclick = () =>{
    console.log('user button clicked!');
   accountBox.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   accountBox.classList.remove('active');
}


document.querySelector('#cancel-update').onclick = (event) => {
   console.log(' cancel button clicked!');
   
   document.querySelector('.edit-user-form').style.display = 'none';
   window.location.href = 'admin_users.php';
}