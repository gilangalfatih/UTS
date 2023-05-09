<?php
    abstract  class Peserta {
        abstract protected function tampil();
    }
 class mhsw extends Peserta {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=dbakademik", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM tb_mhsw";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into tb_mhsw values ('','".$_GET['nim']."','".$_GET['nama']."','".$_GET['alamat']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from tb_mhsw where mhsw_id='".$_GET['mhsw_id']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM tb_mhsw where mhsw_id='".$_GET['mhsw_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id, $nim,$nama,$alamat)
    {
        $sql = "update tb_mhsw set mhsw_nim='".$nim."', mhsw_nama='".$nama."', mhsw_alamat='".$alamat."' where mhsw_id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($alamat){
        $sql = "SELECT * FROM tb_mhsw WHERE mhsw_alamat LIKE '%".$alamat."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }

 class dosen extends Peserta {
    private $db;
    public function __construct()
        {
      try {
    $this->db = new PDO("mysql:host=localhost;dbname=dbakademik", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
           }
       }
       public function tampil()
       {
           $sql = "SELECT * FROM tb_dosen";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }
   
       public function simpan()
       {
           $sql = "insert into tb_dosen values ('','".$_GET['nip']."','".$_GET['nama']."','".$_GET['alamat']."')";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           echo "DATA BERHASIL DISIMPAN !";
       } 
   
       public function hapus()
       {
           $sqls = "delete from tb_dosen where dosen_id='".$_GET['dosen_id']."'";
           $stmts = $this->db->prepare($sqls);
           $stmts->execute();
           echo "DATA BERHASIL DIHAPUS !";
       }      
       public function tampil_update()
       {
           $sql = "SELECT * FROM tb_dosen where dosen_id='".$_GET['dosen_id']."'";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }
       public function update($id,$nip,$nama,$alamat)
       {
           $sql = "update tb_dosen set dosen_nip='".$nip."', dosen_nama='".$nama."', dosen_alamat='".$alamat."' where dosen_id='".$id."'";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           echo "DATA BERHASIL DIUPDATE !";
       } 
       public function cari($alamat){
           $sql = "SELECT * FROM tb_dosen WHERE dosen_alamat LIKE '%".$alamat."%'
           ";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }  
   
    }

 class prodi extends Peserta {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=dbakademik", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM tb_prodi where id_mhsw ='".$_GET['id_mhsw']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function tampildosen()
    {
        $sql = "SELECT * FROM tb_prodi where id_dosen ='".$_GET['dosen_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into tb_prodi values ('','".$_GET['prodi']."','".$_GET['id']."',null)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 
    public function simpandosen()
    {
        $sql = "insert into tb_mhsw values ('','".$_GET['prodi']."',null,'".$_GET['id']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from tb_mhsw where id='".$_GET['id']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM tb_mhsw where mhsw_id='".$_GET['id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($prodi, $id)
    {
        $sql = "update tb_prodi set prodi='".$prodi."' where id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($alamat){
        $sql = "SELECT * FROM tb_mhsw WHERE mhsw_alamat LIKE '%".$alamat."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }