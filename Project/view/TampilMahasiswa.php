<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");
include("view/form.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$data = null;
		$dataForm = '';
		
		// Handle delete action
		if (isset($_GET['delete'])) {
			$id = $_GET['delete'];
			$this->prosesmahasiswa->deleteMahasiswa($id);
			header("Location: index.php");
			exit;
		}
		
		// Handle add form
		if (isset($_GET['add'])) {
			$form = new Form('Tambah Mahasiswa', 'add');
			$dataForm = $form->renderForm();
		}
		
		// Handle edit form
		if (isset($_GET['edit'])) {
			$id = $_GET['edit'];
			$mahasiswaData = $this->prosesmahasiswa->getMahasiswaById($id);
			$form = new Form('Edit Mahasiswa', 'update', $id);
			$form->setForm($mahasiswaData);
			$dataForm = $form->renderForm();
		}
		
		// Menampilkan semua data mahasiswa
		$this->prosesmahasiswa->prosesDataMahasiswa();

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$id = $this->prosesmahasiswa->getId($i);
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelp($i) . "</td>
			<td>
				<a href='index.php?edit=$id' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i> Edit</a>
				<a href='index.php?delete=$id' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash'></i> Hapus</a>
			</td>
			</tr>";
		}
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("DATA_FORM", $dataForm);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}