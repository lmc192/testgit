
////////EDIT CAT FORM VALIDATION///////
//ALERT to prevent form submission when name is blank andwhen age is not a valid number < 25
document.edit_cat_form.onsubmit = function() {
  var age = document.edit_cat_form.age.value;
  var name = document.edit_cat_form.cat_name.value;
  if (name==="" || isNaN(age) || Number(age) > 25 || age=="") {
    alert("Name can't be blank / Age must be a number less than 25");
    return false;
  }
}

// target the text form for entering cat name - do something when user clicks out of box
document.edit_cat_form.cat_name.onblur = function() {
  //if cat name field is blank, add a <p> element above the form to tell user not to submit blank
var name = document.edit_cat_form.cat_name.value;
  if (name==="") {
    document.getElementById("formerrorname").innerHTML = "NO NAME";
  } else if (name!=="") {
    document.getElementById("formerrorname").innerHTML = ""
  }
}

// target the text form for entering cat name - do something when user clicks out of box
document.edit_cat_form.age.onblur = function() {
  //if cat name field is blank, add a <p> element above the form to tell user not to submit blank
var age = document.edit_cat_form.age.value;
  if (isNaN(age) || Number(age) > 25 || age=="") {
    document.getElementById("formerrorage").innerHTML = "AGE MUST BE A NUMBER AND LESS THAN 25";
  } else if (Number(age) < 25 && Number(age) !=="") {
    document.getElementById("formerrorage").innerHTML = ""
  }
}

///////////OTHER JAVASCRIPT FUN THINGS////////////////
//EDIT CAT//
//target the select drop down option part of the form - do something when user changes this
document.edit_cat_form.ranking.onchange = function() {
  //create a variable for the index of the selected option (which is considered an array)
  var id = document.edit_cat_form.ranking.selectedIndex;
  //create a new variable for the value against the selected index
  var ranking = document.edit_cat_form.ranking[id].value;
  if (ranking = 1) {
    document.getElementById("test").innerHTML = "IM DOING A TEST YOU JUST SELETCTED TOP RANKING MATE!!";
  }
}