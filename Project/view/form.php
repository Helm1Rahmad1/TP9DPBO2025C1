<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class Form
{
    private $formTemplate = '';
    private $formData = null;
    private $formTitle = '';
    private $formAction = '';
    private $formId = '';

    function __construct($title = '', $action = '', $id = '')
    {
        // konstruktor
        $this->formTitle = $title;
        $this->formAction = $action;
        $this->formId = $id;
    }

    function setForm($data = null)
    {
        $this->formData = $data;
    }

    function renderForm()
    {
        // Handle form submit untuk add atau update
        if (isset($_POST['submit'])) {
            $data = array(
                'nim' => $_POST['nim'],
                'nama' => $_POST['nama'],
                'tempat' => $_POST['tempat'],
                'tl' => $_POST['tl'],
                'gender' => $_POST['gender'],
                'email' => $_POST['email'],
                'telp' => $_POST['telp']
            );

            if ($this->formAction == 'add') {
                // Proses add data
                $this->processAdd($data);
                header("Location: index.php");
                exit;
            } else if ($this->formAction == 'update') {
                // Proses update data
                $this->processUpdate($this->formId, $data);
                header("Location: index.php");
                exit;
            }
        }

        // Buat form
        $nim = isset($this->formData['nim']) ? $this->formData['nim'] : '';
        $nama = isset($this->formData['nama']) ? $this->formData['nama'] : '';
        $tempat = isset($this->formData['tempat']) ? $this->formData['tempat'] : '';
        $tl = isset($this->formData['tl']) ? $this->formData['tl'] : '';
        $gender = isset($this->formData['gender']) ? $this->formData['gender'] : '';
        $email = isset($this->formData['email']) ? $this->formData['email'] : '';
        $telp = isset($this->formData['telp']) ? $this->formData['telp'] : '';

        $html = '
        <div class="card mb-4">
            <div class="card-header">
                <h5>' . $this->formTitle . '</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="' . $nim . '" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="' . $nama . '" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempat" name="tempat" value="' . $tempat . '" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tl" name="tl" value="' . $tl . '" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="laki" value="Laki-laki" ' . ($gender == 'Laki-laki' ? 'checked' : '') . ' required>
                                <label class="form-check-label" for="laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" ' . ($gender == 'Perempuan' ? 'checked' : '') . ' required>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="' . $email . '" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telp" name="telp" value="' . $telp . '" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <a href="index.php" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>';

        return $html;
    }

    function processAdd($data)
    {
        // Kode untuk add data
        include_once('presenter/ProsesMahasiswa.php');
        $proses = new ProsesMahasiswa();
        $proses->addMahasiswa($data);
    }

    function processUpdate($id, $data)
    {
        // Kode untuk update data
        include_once('presenter/ProsesMahasiswa.php');
        $proses = new ProsesMahasiswa();
        $proses->updateMahasiswa($id, $data);
    }
}