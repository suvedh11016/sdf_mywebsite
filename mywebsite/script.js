
function toggleSubMenu(subMenuId) {
  var subMenu = document.getElementById(subMenuId);
  subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
}

var peopleButton = document.querySelector('nav ul li:nth-child(2) a');

var academicsButton = document.querySelector('nav ul li:nth-child(3) a');

var studentSubMenu = document.getElementById('people-submenu');
var facultySubMenu = document.getElementById('people-submenu');
var timetableSubMenu = document.getElementById('academics-submenu');
var curriculumSubMenu = document.getElementById('academics-submenu');


peopleButton.addEventListener('click', function (event) {
  event.preventDefault();

  toggleSubMenu('people-submenu');
  toggleSubMenu('people-submenu');
});

academicsButton.addEventListener('click', function (event) {
  event.preventDefault();

  toggleSubMenu('academics-submenu');
  toggleSubMenu('academics-submenu');
});
document.addEventListener('click', function (event) {
  if (
    event.target !== peopleButton &&
    !peopleButton.contains(event.target) &&
    event.target !== studentSubMenu &&
    event.target !== facultySubMenu
  ) {
    studentSubMenu.style.display = 'none';
    facultySubMenu.style.display = 'none';
  }

  if (
    event.target !== academicsButton &&
    !academicsButton.contains(event.target) &&
    event.target !== timetableSubMenu &&
    event.target !== curriculumSubMenu
  ) {
    timetableSubMenu.style.display = 'none';
    curriculumSubMenu.style.display = 'none';
  }
});