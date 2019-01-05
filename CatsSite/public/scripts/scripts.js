//target the text form for entering cat name - do something when user clicks out of box
document.create_cat_form.cat_name.onblur = function() {
  //if cat name field is blank, add a <p> element above the form to tell user not to submit blank
  if (document.create_cat_form.cat_name.value==="") {
    // alert("All Kitties Need Names!")
    var x = document.getElementById("formerror");
    x.innerHTML = "Name is poo";
  }
}

//target the button part of the form - do something when user clicks the button
// document.create_cat_form.createbutton.onclick = function() {
//   //if cat name field is blank, add a <p> element above the form to tell user not to submit blank
//   if (document.create_cat_form.cat_name.value==="") {
//     alert("All Kitties Need Names!")
//   }
// }

//target the select drop down option part of the form - do something when user changes this
document.create_cat_form.position.onchange = function() {
  //create a variable for the index of the selected option (which is considered an array)
  var id = document.create_cat_form.position.selectedIndex;
  //create a new variable for the value against the selected index
  var position = document.create_cat_form.position[id].value;
  if (position = 1) {
    document.getElementById("test").innerHTML = "IM DOING A TEST YOU JUST SELETCTED POSITION ONE MATE!!";
  }
}

//onblur - when you click out of the targeted element
//onchange - when you change the element
//onclick - when you click on the element
//onmouseover - when you move the mouse over the element
///onmouseout - when you move the mouse away from the element
//onkeydown - when you push a keyboard key
//when the browser loads



document.create_cat_form.onsubmit = function() {
  if (document.create_cat_form.cat_name.value==="") {
  alert("Submission Interrupted");
  return false;
} }
