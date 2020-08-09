<?
function validateData($type, $value){
  if($type=='name'){
    return !preg_match('/[&<>]/', $value);
  }
  elseif($type=='username'){
    return preg_match('/^[-\w.]+$/', $value);
  }
  elseif($type=='password'){
    # return preg_match('/^[-\w~\!\@#\'\$%\^&\*\(\)]+$/', $value);
    return preg_match_all('/^[\w\s!#\$%&\(\)*\+,\-\.\/:;<=>\?@\[\\]\^_`\{\|\}~\"\']+$/', $value);
  }
  elseif($type=='email'){
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }
  return false;
}

$val = "asd-9";
try {
  
echo validateData('username', $val);
} catch (Exception $e) {
  echo $val;
}
?>