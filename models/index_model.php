<?php
class Index_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function check_login($username, $password){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE username = '$username'
                                    AND password = '$password' AND active = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_data($username, $password){
        $query = $this->db->query("SELECT * FROM tbl_users WHERE username = '$username'
                                    AND password = '$password' AND active = 1");
        return $query->fetchAll();
    }

    function check_login_s($username, $password, $truonghocid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE username = '$username'
                                    AND password = '$password' AND truonghoc_id = $truonghocid AND active = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_data_s($username, $password, $truonghocid){
        $query = $this->db->query("SELECT * FROM tbl_users WHERE username = '$username'
                                    AND password = '$password' AND truonghoc_id = $truonghocid AND active = 1");
        return $query->fetchAll();
    }

    function get_truonghoc(){
        $query = $this->db->query("SELECT id, title FROM tbl_truonghoc");
        return $query->fetchAll();
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function getFetObj($keyword, $truonghocid, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_elearning WHERE truonghoc_id = $truonghocid
                                    AND (linh_vuc LIKE '%$keyword%' OR de_tai LIKE '%$keyword%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, linh_vuc, de_tai, create_at, is_e, (SELECT title FROM tbldm_exam
                                    WHERE tbldm_exam.id = exam_id) AS exam
                                    FROM tbl_elearning WHERE truonghoc_id = $truonghocid
                                    AND (linh_vuc LIKE '%$keyword%' OR de_tai LIKE '%$keyword%')
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_user($keyword, $truonghocid, $userid, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_elearning WHERE truonghoc_id = $truonghocid
                                    AND user_id = $userid AND (linh_vuc LIKE '%$keyword%' OR de_tai LIKE '%$keyword%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, linh_vuc, de_tai, create_at, is_e, (SELECT title FROM tbldm_exam
                                    WHERE tbldm_exam.id = exam_id) AS exam
                                    FROM tbl_elearning WHERE truonghoc_id = $truonghocid
                                    AND user_id = $userid AND (linh_vuc LIKE '%$keyword%' OR de_tai LIKE '%$keyword%')
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function getFetObj_public($keyword, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_elearning WHERE publish = 1
                                    AND (linh_vuc LIKE '%$keyword%' OR de_tai LIKE '%$keyword%')");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, linh_vuc, de_tai, create_at, is_e, (SELECT title FROM tbldm_exam
                                    WHERE tbldm_exam.id = exam_id) AS exam
                                    FROM tbl_elearning WHERE publish = 1 AND (linh_vuc LIKE '%$keyword%' OR de_tai LIKE '%$keyword%')
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_detail($id){
        $query = $this->db->query("SELECT truonghoc_id, id, linh_vuc, de_tai, file, exam_id, id, user_id, create_at,
                                    (SELECT title FROM tbldm_exam WHERE tbldm_exam.id = exam_id) AS exam,
                                    (SELECT fullname FROM tbl_users WHERE tbl_users.id = user_id) AS nguoitao,
                                    (SELECT title FROM tbl_truonghoc WHERE tbl_truonghoc.id = truonghoc_id) AS truonghoc
                                    FROM tbl_elearning WHERE id = $id");
        return $query->fetchAll();
    }
}
?>
