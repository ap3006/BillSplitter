function openNotification() {
    document.getElementById("myNotification").style.width = "8%";
    // document.getElementById("main").style.opacity = "0.6";
}

function closeNotification() {
  document.getElementById("myNotification").style.width = "0";
  // document.getElementById("main").style.opacity = "1";
}

function openNav() {
    document.getElementById("mySidenav").style.width = "8%";
    // document.getElementById("main").style.opacity = "0.6";

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    // document.getElementById("main").style.opacity = "1";
}

var modal = document.getElementById('simpleModal');
var modalTwo = document.getElementById('simpleModalTwo');
var modalBtn = document.getElementById('modalBtn');
var modalBtnTwo = document.getElementById('modalBtnTwo');
var closeBtn = document.getElementById('closebtnOne');
var closeBtnTwo = document.getElementById('closebtnTwo');

modalBtn.addEventListener('click', openModal);
modalBtnTwo.addEventListener('click', openModalTwo);
closeBtn.addEventListener('click', closeModal);
closeBtnTwo.addEventListener('click', closeModalTwo);

function openModal(){
  closeNav();
  modal.style.display = 'block';
}

function openModalTwo(){
  closeNav();
  modalTwo.style.display = 'block';
}

function closeModal(){
  modal.style.display = 'none';
}

function closeModalTwo(){
  modalTwo.style.display = 'none';
}
