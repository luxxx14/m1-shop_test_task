<?php

class Model_main extends Model
{
    public function get_data()
    {
        $sql_cmd = "SELECT * FROM `test` ORDER BY `id`";
        $sql_res = $this->db->sqlExec($sql_cmd);
        //$sql_num = mysqli_num_rows($sql_res);
	    //var_dump($sql_num);
        $data = array();
        while($sql_row2 = mysqli_fetch_assoc($sql_res)) {
            $data[] = $sql_row2;
        }
        //echo $sql_num;
        return $data;
    }
}