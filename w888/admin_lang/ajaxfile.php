<?php
  require_once 'inc/conn.php';
  $value = json_decode(file_get_contents("php://input"));
  $type = $value->type;
  $data = null;
  if($type == 'get'):
    $query = "select * from bom_tb_lang_page order by lang_id desc";
    $result = sql_query($query);
    while($key = mysqli_fetch_array($result)){
      if($key["type"]==1){
        $key[99] = "$"."lang_member[".$key["lang_id"]."]";
      }else{
        $key[99] = "$"."lang_ag[".$key["lang_id"]."]";
      }
      
      $data[] = $key;
    }
    echo json_encode($data);
  elseif($type == 'getType'):
    $query = "select * from bom_tb_lang_page where type = '".$value->langType."' order by lang_id desc";
    $result = sql_query($query);
    while($key = mysqli_fetch_array($result)){
      if($key["type"]==1){
        $key[99] = "$"."lang_member[".$key["lang_id"]."]";
      }else{
        $key[99] = "$"."lang_ag[".$key["lang_id"]."]";
      }
      $data[] = $key;
    }
    echo json_encode($data);
  elseif($type == 'insert'):
    $en = sql_escape_str($value->lang->en);
    $th = sql_escape_str($value->lang->th);
    $jp = sql_escape_str($value->lang->jp);
    $ko = sql_escape_str($value->lang->ko);
    $cn = sql_escape_str($value->lang->cn);
    $vn = sql_escape_str($value->lang->vn);
    $id = sql_escape_str($value->lang->id);
    $mm = sql_escape_str($value->lang->mm);
    $km = sql_escape_str($value->lang->km);
    $la = sql_escape_str($value->lang->la);
    $type = $value->lang->type;
    $query = "insert into bom_tb_lang_page (en, th, jp, ko, cn, vn, id, mm, km, la, type) values ('$en', '$th', '$jp', '$ko', '$cn', '$vn', '$id', '$mm', '$km', '$la', '$type')";
    //$query = "insert into bom_tb_lang_page (en, th, jp, ko, cn, vn, id, mm, km, la, type) values ('xxx', '$th', '$th', '$th', '$th', '$th', '$th', '$th', '$th', '$th', '$type')";
    sql_query($query);

    /*$queryx = "select th from bom_tb_lang_page where th = '$th' and type = '$type'";
    $resultx = sql_query($queryx);
    $nr = mysqli_num_rows($resultx);
    if($nr <= 0):
      $query = "insert into bom_tb_lang_page (en, th, jp, ko, cn, vn, id, mm, km, la, type) values ('$th', '$th', '$th', '$th', '$th', '$th', '$th', '$th', '$th', '$th', '$type')";
      sql_query($query);
    endif;*/

  elseif($type == 'delete'):
    $lang_id = $value->lang_id;
    $query = "delete from bom_tb_lang_page where lang_id = '$lang_id'";
    $result = sql_query($query);
  elseif($type == 'field'):
    $lang_id = $value->lang_id;
    $type_lang = $value->type_lang;
    $text = $value->text;
    $query = "update bom_tb_lang_page set $type_lang='$text' where lang_id = $lang_id";
    sql_query($query);
  elseif($type == 'exportPHP'):
    $type_lang = $value->type_lang;
    if($type_lang == 'member'):
      $query = "select * from bom_tb_lang_page where type=1 order by lang_id asc";
      $result = sql_query($query);
    elseif($type_lang == 'ag'):
      $query = "select * from bom_tb_lang_page where type=2 order by lang_id asc";
      $result = sql_query($query);
    endif;
    $file_en = fopen("./export/lang_".$type_lang."_en.php", "w") or die("Unable to open file!");
    $file_th = fopen("./export/lang_".$type_lang."_th.php", "w") or die("Unable to open file!");
    $file_jp = fopen("./export/lang_".$type_lang."_jp.php", "w") or die("Unable to open file!");
    $file_ko = fopen("./export/lang_".$type_lang."_ko.php", "w") or die("Unable to open file!");
    $file_cn = fopen("./export/lang_".$type_lang."_cn.php", "w") or die("Unable to open file!");
    $file_vn = fopen("./export/lang_".$type_lang."_vn.php", "w") or die("Unable to open file!");
    $file_id = fopen("./export/lang_".$type_lang."_id.php", "w") or die("Unable to open file!");
    $file_mm = fopen("./export/lang_".$type_lang."_mm.php", "w") or die("Unable to open file!");
    $file_km = fopen("./export/lang_".$type_lang."_km.php", "w") or die("Unable to open file!");
    $file_la = fopen("./export/lang_".$type_lang."_la.php", "w") or die("Unable to open file!");
    fwrite($file_en, "<?"."\n");
    fwrite($file_th, "<?"."\n");
    fwrite($file_jp, "<?"."\n");
    fwrite($file_ko, "<?"."\n");
    fwrite($file_cn, "<?"."\n");
    fwrite($file_vn, "<?"."\n");
    fwrite($file_id, "<?"."\n");
    fwrite($file_mm, "<?"."\n");
    fwrite($file_km, "<?"."\n");
    fwrite($file_la, "<?"."\n");
    // $find = "array(";
    $find_double_quote = '"';
      foreach ($result as $key => $value):
        if(strpos($value['en'],$find_double_quote) === false):
          $en = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$value["en"].'";';
        else:
          $str = str_replace($find_double_quote, '\"', $value["en"]);
          $en = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$str.'";';
          // $en = '$lang_'.$type_lang.'['.$value["lang_id"].'] = '.$value["en"].';';
        endif;
        if(strpos($value['th'],$find_double_quote) === false):
          $th = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$value["th"].'";';
        else:
          $str = str_replace($find_double_quote, '\"', $value["th"]);
          $th = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$str.'";';
          // $th = '$lang_'.$type_lang.'['.$value[lang_id].'] = '.$value[th].';';
        endif;
        if(strpos($value['jp'],$find_double_quote) === false):
          $jp = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$value["jp"].'";';
        else:
          $str = str_replace($find_double_quote, '\"', $value["jp"]);
          $jp = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$str.'";';
          // $jp = '$lang_'.$type_lang.'['.$value[lang_id].'] = '.$value[jp].';';
        endif;
        if(strpos($value['ko'],$find_double_quote) === false):
          $ko = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$value["ko"].'";';
        else:
          $str = str_replace($find_double_quote, '\"', $value["ko"]);
          $ko = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$str.'";';
          // $ko = '$lang_'.$type_lang.'['.$value[lang_id].'] = '.$value[ko].';';
        endif;
        if(strpos($value['cn'],$find_double_quote) === false):
          $cn = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$value["cn"].'";';
        else:
          $str = str_replace($find_double_quote, '\"', $value["cn"]);
          $cn = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$str.'";';
          // $cn = '$lang_'.$type_lang.'['.$value[lang_id].'] = '.$value[cn].';';
        endif;
        if(strpos($value['vn'],$find_double_quote) === false):
          $vn = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$value["vn"].'";';
        else:
          $str = str_replace($find_double_quote, '\"', $value["vn"]);
          $vn = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$str.'";';
          // $vn = '$lang_'.$type_lang.'['.$value[lang_id].'] = '.$value[vn].';';
        endif;
        if(strpos($value['id'],$find_double_quote) === false):
          $id = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$value["id"].'";';
        else:
          $str = str_replace($find_double_quote, '\"', $value["id"]);
          $id = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$str.'";';
          // $id = '$lang_'.$type_lang.'['.$value[lang_id].'] = '.$value[id].';';
        endif;
        if(strpos($value['mm'],$find_double_quote) === false):
          $mm = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$value["mm"].'";';
        else:
          $str = str_replace($find_double_quote, '\"', $value["mm"]);
          $mm = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$str.'";';
          // $mm = '$lang_'.$type_lang.'['.$value[lang_id].'] = '.$value[mm].';';
        endif;
        if(strpos($value['km'],$find_double_quote) === false):
          $km = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$value["km"].'";';
        else:
          $str = str_replace($find_double_quote, '\"', $value["km"]);
          $km = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$str.'";';
          // $km = '$lang_'.$type_lang.'['.$value[lang_id].'] = '.$value[km].';';
        endif;
        if(strpos($value['la'],$find_double_quote) === false):
          $la = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$value["la"].'";';
        else:
          $str = str_replace($find_double_quote, '\"', $value["la"]);
          $la = '$lang_'.$type_lang.'['.$value["lang_id"].'] = "'.$str.'";';
          // $la = '$lang_'.$type_lang.'['.$value[lang_id].'] = '.$value[la].';';
        endif;
      fwrite($file_en, $en."\n");
      fwrite($file_th, $th."\n");
      fwrite($file_jp, $jp."\n");
      fwrite($file_ko, $ko."\n");
      fwrite($file_cn, $cn."\n");
      fwrite($file_vn, $vn."\n");
      fwrite($file_id, $id."\n");
      fwrite($file_mm, $mm."\n");
      fwrite($file_km, $km."\n");
      fwrite($file_la, $la."\n");
    endforeach;
    fwrite($file_en, "?>");
    fwrite($file_th, "?>");
    fwrite($file_jp, "?>");
    fwrite($file_ko, "?>");
    fwrite($file_cn, "?>");
    fwrite($file_vn, "?>");
    fwrite($file_id, "?>");
    fwrite($file_mm, "?>");
    fwrite($file_km, "?>");
    fwrite($file_la, "?>");
    fclose($file_en);
    fclose($file_th);
    fclose($file_jp);
    fclose($file_ko);
    fclose($file_cn);
    fclose($file_vn);
    fclose($file_id);
    fclose($file_mm);
    fclose($file_km);
    fclose($file_la);
  elseif($type == 'login'):
    session_start();
    $_SESSION["manage_language"] = 'manage_language';
  elseif($type == 'logout'):
    session_start();
    unset($_SESSION["manage_language"]);
  else:
    $lang_id = $value->lang->lang_id;
    $en = sql_escape_str($value->lang->en);
    $th = sql_escape_str($value->lang->th);
    $jp = sql_escape_str($value->lang->jp);
    $ko = sql_escape_str($value->lang->ko);
    $cn = sql_escape_str($value->lang->cn);
    $vn = sql_escape_str($value->lang->vn);
    $id = sql_escape_str($value->lang->id);
    $mm = sql_escape_str($value->lang->mm);
    $km = sql_escape_str($value->lang->km);
    $la = sql_escape_str($value->lang->la);
    $type = $value->lang->type;
    $query = "update bom_tb_lang_page set en='$en', th='$th', jp='$jp', ko='$ko', cn='$cn', vn='$vn', id='$id', mm='$mm', km='$km', la='$la', type='$type' where lang_id = $lang_id";
    sql_query($query);
  endif;