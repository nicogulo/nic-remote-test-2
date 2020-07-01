<?php


class MPelatihan extends CI_Model{

    public $kdPelatihan;
    public $pelatihan;
	public $alamat;
	public $telp;

    public function __construct(){
        parent::__construct();
    }

    private function getTable(){
        return 'pelatihan';
    }

    private function getData(){
        $data = array(
            'pelatihan' => $this->pelatihan,
			'alamat' => $this->alamat,
			'telp' => $this->telp
        );

        return $data;
    }

    public function getAll()
    {
        $pelatihan = array();
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $pelatihan[] = $row;
            }
        }
        return $pelatihan;
    }


    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $status = $this->db->update($this->getTable(), $this->getData(), $where);
        return $status;

    }

    public function delete($id)
    {
        $this->db->where('kdPelatihan', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('kdPelatihan');
        $this->db->order_by('kdPelatihan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }

public function getById()
    {

        $this->db->from($this->getTable());
        $this->db->where('kdPelatihan',$this->kdPelatihan);
        $query = $this->db->get();

        return $query->row();
    }

}