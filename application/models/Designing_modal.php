 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Designing_modal extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function masterData()

{

$this->db->select('*');
$this->db->where('admin_role','Designing');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('master_admin');  

         return $query;

}

public function depadmineditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$id);
        $query = $this->db->get();

        return $query->result_array();
}


    public function deletedesign($id)
{
  $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}

public function designeditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$id);
        $query = $this->db->get();

        return $query->result_array();
}


}
