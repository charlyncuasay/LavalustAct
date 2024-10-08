<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class user_model extends Model
{
    public function read()
    {
        return $this->db->table('cgc_users')->get_all();
    }

    public function create($lastname, $firstname, $email, $gender, $address)
    {
        $data = array(
            'cgc_last_name' => $lastname,
            'cgc_first_name' => $firstname,
            'cgc_email' => $email,
            'cgc_gender' => $gender,
            'cgc_address' => $address
        );
        return $this->db->table('cgc_users')->insert($data);
    }

    public function get1($id)
    {
        return $this->db->table('cgc_users')->where('id', $id)->get();
    }

    public function update($lastname, $firstname, $email, $gender, $address, $id)
    {
        $data = array(
            'cgc_last_name' => $lastname,
            'cgc_first_name' => $firstname,
            'cgc_email' => $email,
            'cgc_gender' => $gender,
            'cgc_address' => $address
        );
        return $this->db->table('cgc_users')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('cgc_users')->where('id', $id)->delete();
    }
}