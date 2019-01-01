<?php

// validate data presence
// uses trim() to ignore empty spaces
// uses === to avoid false positives
// better than empty() which considers '0' to be empty - maybe I'll use this though?
// returns true if data blank / false if not blank
function is_blank($value) {
  return !isset($value) || trim($value) === '';
}

// validate data presence
// reverse of is_blank()
// returns true if data not blank / false if blank
function has_presence($value) {
  return !is_blank($value);
}

// validate string length
// spaces count towards length
// use trim() if spaces should not count
// returns true if length is greater than min
function has_length_greater_than($value, $min) {
  $length = strlen($value);
  return $length > $min;
}

// validate string length
// spaces count towards length
// use trim() if spaces should not count
// returns true if length is less than max
function has_length_less_than($value, $max) {
  $length = strlen($value);
  return $length < $max;
}

// validate string length
// spaces count towards length
// use trim() if spaces should not count
// returns true if length is equal to value
function has_length_exactly($value, $exact) {
  $length = strlen($value);
  return $length == $exact;
}

// validate string length
// spaces count towards length
// use trim() if spaces should not count
// pass in $options as an array with values for 'min' and 'max' and 'exact' to carry out the validations
// returns true if validations are good / false if not
function has_length($value, $options) {
  if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
    return false;
  } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1 )) {
    return false;
  } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
    return false;
  } else {
    return true;
  }
}

// validate inclusion of a value
// pass in $set as an array with values required to be included
// returns true if value includes / false if not
function has_inclusion_of($value, $set) {
  //in_array() checks for value in a set -
  //same as this function but creating a new function with better naming conventions makes it clearer what the function is doing -
  //(but maybe I'll just use in_array for my project?)
  return in_array($value, $set);
}

// validate exclusion of a value
// pass in $set as an array with values required to be excluded
// returns true if value is excluded / false if not
function has_exclusion_of($value, $set) {
  return !in_array($value, $set);
}

// validation the inclusion of specific characters
// strpos returns string start position true or false - uses !== to prevent position 0 from being considered false
// strpos if faster than preg_match()
function has_string($value, $required_string) {
  return strpos($value, $required_string) !== false;
}


function has_valid_email_format($value) {
  $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
  return preg_match($email_regex, $value) === 1;
}
?>
