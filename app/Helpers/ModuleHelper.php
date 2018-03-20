<?php
/**
 * Created by PhpStorm.
 * User: welch
 * Date: 2018/3/4
 * Time: 上午 11:05
 */

namespace App\Helpers;


class ModuleHelper
{
    public function getTree($data,$field_name,$field_id='cate_id',$field_parent='cate_parent',$field_level,$level,$pid=0,$alone=True)
    {
        $arr = array();
        foreach ($data as $k=>$v){
            if($v->$field_parent==$pid && ((!is_bool($alone))?$v->cate_id == $alone:$alone)){
                $data[$k]['_'.$field_name] = $data[$k][$field_name];
                $arr[] = $data[$k];
                foreach ($data as $m=>$n){
                    if($n->$field_parent == $v->$field_id && $n->$field_level == 2 && $n->$field_level <= $level){
                        $data[$m]['_'.$field_name] = ' ❙❙ '.$data[$m][$field_name];
                        $arr[] = $data[$m];
                        foreach ($data as $o=>$p){
                            if($p->$field_parent == $n->$field_id && $p->$field_level == 3 && $p->$field_level <= $level){
                                $data[$o]['_'.$field_name] = ' ❙❙❙ '.$data[$o][$field_name];
                                $arr[] = $data[$o];
                                foreach ($data as $r=>$s){
                                    if($s->$field_parent == $p->$field_id && $s->$field_level == 4 && $s->$field_level <= $level){
                                        $data[$r]['_'.$field_name] = ' ❙❙❙❙ '.$data[$r][$field_name];
                                        $arr[] = $data[$r];
                                        foreach ($data as $x=>$y){
                                            if($y->$field_parent == $s->$field_id && $y->$field_level == 5 && $y->$field_level <= $level){
                                                $data[$x]['_'.$field_name] = ' ❙❙❙❙❙ '.$data[$x][$field_name];
                                                $arr[] = $data[$x];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $arr;
    }
}