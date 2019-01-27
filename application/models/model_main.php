<?php

class Model_main extends Model
{
    public function get_data()
    {
        $sql_cmd = "SELECT * FROM `test` ORDER BY `id`";
        $sql_res = $this->db->sqlExec($sql_cmd);
        $data = array();
        while($sql_row2 = mysqli_fetch_assoc($sql_res)) {
            $data[] = $sql_row2;
        }

        return $data;
    }


    public function insert_data($data) {
        $sql_cmd = "INSERT INTO `test` 
                    (`id`,
                      `album_cover`,
                      `album_name`,
                      `artist_name`,
                      `album_year`,
                      `album_duration`,
                      `buy_date`,
                      `purchase_price`,
                      `storage_code`)
                    VALUES (null, 
                            'image.png', 
                            '".$this->db->mysql_escape_mimic($data['album_name'])."', 
                            '".$this->db->mysql_escape_mimic($data['artist_name'])."', 
                            '".$this->db->mysql_escape_mimic($data['album_year'])."', 
                            '".$this->db->mysql_escape_mimic($data['album_duration'])."', 
                            '".$this->db->mysql_escape_mimic($data['buy_date'])."', 
                            '".$this->db->mysql_escape_mimic($data['purchase_price'])."', 
                            '".$this->db->mysql_escape_mimic($data['storage_code'])."')";

        $sql_res = $this->db->sqlExec($sql_cmd);

        return $sql_res;
    }
}