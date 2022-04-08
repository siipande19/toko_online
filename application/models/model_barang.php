<?php 


class model_barang extends CI_Model{
	public function tampil_data(){
		$sql = "SELECT * FROM tb_barang ORDER BY rating DESC" ;
        return $this->db->query($sql);
	}
	public function tampil_barang(){
		$sql = "SELECT * FROM tb_barang" ;
        return $this->db->query($sql);
	}
	public function tampil_user(){
		$query = $this->db->query("SELECT * FROM `tb_user` where role_id = 2");
		return $query->result();
	}
	public function tampil_pesanan(){
		$query = $this->db->query("SELECT * FROM `tb_pesanan`");
		return $query->result();
	}

	public function tambah_barang($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_barang($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function find($id)
	{
		$result = $this->db->where('id_barang', $id)
							->limit(1)
							->get('tb_barang');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}

	public function detail_barang($id_barang)
	{
		$result = $this->db->where('id_barang',$id_barang)->get('tb_barang');
		if($result->num_rows()>0){
			return $result->result();
		}else{
			return false;
		}
	}

	public function get_all(){
			return $this->db->get('tb_barang')->result();
		}
	
	public function ambil_rating($id_barang){
			// $sql = "SELECT p.*,i.* FROM tb_pesanan p
			// 		LEFT JOIN tb_invoice i ON p.id_invoice = i.id
			// 		WHERE i.created_by = '$id_user' AND i.kode_invoice = '$kode_invoice'";
			$sql = "SELECT rating FROM tb_pesanan WHERE rating !=0 AND id_barang='$id_barang'";
        	return $this->db->query($sql);
		}

	public function tampil_data_search($data){
		$sql = "SELECT * FROM tb_barang WHERE ((nama_barang LIKE '%$data[keyword]%') OR (keterangan LIKE '%$data[keyword]%')) $data[rr] ORDER BY rating DESC" ;
        return $this->db->query($sql);
	}
	public function update_rating($id_barang,$rating){
		$sql = "UPDATE `tb_barang` SET `rating`='$rating' WHERE id_barang='$id_barang'";
        return $this->db->query($sql);
	}

	public function get_barang_list($limit, $start){
        $query = $this->db->get('tb_barang', $limit, $start);
        return $query;
    }
}

