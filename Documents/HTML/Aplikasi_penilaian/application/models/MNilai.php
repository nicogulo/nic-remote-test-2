<?php

class MNilai extends CI_Model{

    public $kdPelatihan;
    public $kdKriteria;
    public $nilai;

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'nilai';
    }

    private function getData()
    {
        $data = array(
            'kdPelatihan' => $this->kdPelatihan,
            'kdKriteria' => $this->kdKriteria,
            'nilai' => $this->nilai
        );

        return $data;
    }

    public function insert()
    {
        $status = $this->db->insert($this->getTable(), $this->getData());
        return $status;
    }

    public function getNilaiByPelatihan($id)
    {
        $query = $this->db->query(
            'select u.kdPelatihan, u.pelatihan, k.kdKriteria, u.alamat,u.telp, n.nilai from pelatihan u, nilai n, kriteria k, subkriteria sk where u.kdPelatihan = n.kdPelatihan AND k.kdKriteria = n.kdKriteria and k.kdKriteria = sk.kdKriteria and u.kdPelatihan = '.$id.' GROUP by n.nilai '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function getNilaiPelatihan()
    {
        /* $query = $this->db->query(
            'select u.kdPelatihan, u.pelatihan, k.kdKriteria, k.kriteria ,n.nilai from pelatihan u, nilai n, kriteria k where u.kdPelatihan = n.kdPelatihan AND k.kdKriteria = n.kdKriteria '
        ); */
		$query=$this->db->query('SELECT 
				u.kdPelatihan,
				u.pelatihan,
				k.kdKriteria,
				k.kriteria,
				sum(n.nilai)/COUNT(*) as nilai
				FROM nilai as n
				LEFT JOIN pelatihan as u on u.kdPelatihan=n.kdPelatihan
				LEFT JOIN kriteria as k on k.kdKriteria=n.kdKriteria
				GROUP BY kriteria,pelatihan
				ORDER BY pelatihan');
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function update()
    {
        $data = array('nilai' => $this->nilai);
        $this->db->where('kdPelatihan', $this->kdPelatihan);
        $this->db->where('kdKriteria', $this->kdKriteria);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdPelatihan', $id);
        return $this->db->delete($this->getTable());
    }



    public function getHistory()
    {
        $query=$this->db->query('SELECT *
                FROM pelatihan 
                ORDER BY pelatihan');
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }
}