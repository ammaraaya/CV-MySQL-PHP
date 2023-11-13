<?php
include 'config.php';

function getCVData()
{
  global $conn;
  $query = "SELECT * FROM CVdata WHERE id = 1"; // Sesuaikan dengan id CV 
  $result = mysqli_query($conn, $query);
  return mysqli_fetch_array($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = htmlspecialchars($_POST['nama']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $telepon = htmlspecialchars($_POST['telepon']);
  $email = htmlspecialchars($_POST['email']);
  $web = htmlspecialchars($_POST['web']);
  $SD = htmlspecialchars($_POST['SD']);
  $SMP = htmlspecialchars($_POST['SMP']);
  $SMA = htmlspecialchars($_POST['SMA']);
  $Kuliah = htmlspecialchars($_POST['Kuliah']);
  $Software_System_Design = htmlspecialchars($_POST['Software_System_Design']);
  $Staff_Design_Team = htmlspecialchars($_POST['Staff_Design_Team']);
  $Teknis = htmlspecialchars($_POST['Teknis']);
  $Lunak = htmlspecialchars($_POST['Lunak']);
  $Bahasa = htmlspecialchars($_POST['Bahasa']);
  $foto_path = htmlspecialchars($_POST['foto_path']);

  $query = "UPDATE CVdata SET 
        nama = ?, 
        alamat = ?, 
        telepon = ?, 
        email = ?, 
        web = ?,  
        SD = ?,
        SMP = ?,
        SMA = ?, 
        Kuliah = ?,
        Software_System_Design = ?,
        Staff_Design_Team =  ?,
        Teknis = ?,
        Lunak =  ?,
        Bahasa = ?,
        foto_path = ? 
        WHERE id = 1"; // Sesuaikan dengan id CV 

  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sssssssssssssss", $nama, $alamat, $telepon, $email, $web, $SD, $SMP, $SMA, $Kuliah, $Software_System_Design, $Staff_Design_Team, $Teknis, $Lunak, $Bahasa, $foto_path);

  if (mysqli_stmt_execute($stmt)) {
    echo 'Data berhasil diperbarui';
    print 'Data berhasil diperbarui';
  } else {
    echo 'Terjadi kesalahan saat memperbarui data';
    print'Data gagal diperbarui';
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  header('Location: admin.php');
  exit();
}

$data = getCVData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css">
  <title>Update CV</title>
</head>

<body class="p-3">
  <!-- <div class="container mt-5"> -->
    <nav class="navbar sticky-top bg-body-tertiary biru">
      <div class="container-fluid">
        <h1>Update CV</h1>
        <a class="navbar-brand" href="/cv">View</a>
      </div>
    </nav>
    <div class="card">
      <div class="p-3">
        <div class="card-body">
          <form method="post">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $data['nama']; ?>" placeholder="Nama" required>
              <label for="alamat" class="form-label">Alamat</label>
              <input class="form-control" id="alamat" type="text" name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Alamat" required>
              <label for="telepon" class="form-label">Telepon</label>
              <input class="form-control" id="telepon" type="text" name="telepon" value="<?php echo $data['telepon']; ?>" placeholder="Telepon" required>
              <label for="email" class="form-label">Email</label>
              <input class="form-control" id="email" type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Email" required>
              <label for="web" class="form-label">Web</label>
              <input class="form-control" id="web" type="text" name="web" value="<?php echo $data['web']; ?>" placeholder="Web" required>
              <label for="SD" class="form-label">SD</label>
              <textarea class="form-control" id="SD" name="SD" rows="3" placeholder="SD" required><?php echo $data['SD']; ?></textarea>
              <label for="SMP" class="form-label">SMP</label>
              <textarea class="form-control" id="SMP" name="SMP" rows="3" placeholder="SMP" required><?php echo $data['SMP']; ?></textarea>
              <label for="SMA" class="form-label">SMA</label>
              <textarea class="form-control" id="SMA" name="SMA" rows="3" placeholder="SMA" required><?php echo $data['SMA']; ?></textarea>
              <label for="Kuliah" class="form-label">Kuliah</label>
              <textarea class="form-control" id="Kuliah" name="Kuliah" rows="3" placeholder="Kuliah" required><?php echo $data['Kuliah']; ?></textarea>
              <label for="Software_System_Design" class="form-label">Pengalaman Kerja 1</label>
              <textarea class="form-control" id="Software_System_Design" name="Software_System_Design" rows="3" placeholder="Pengalaman kerja" required><?php echo $data['Software_System_Design']; ?></textarea>
              <label for="Staff_Design_Team" class="form-label">Pengalaman Kerja 2</label>
              <textarea class="form-control" id="Staff_Design_Team" name="Staff_Design_Team" rows="3" placeholder="Pengalaman kerja" required><?php echo $data['Staff_Design_Team']; ?></textarea>
              <label for="Teknis" class="form-label">Keterampilan Teknis</label>
              <textarea class="form-control" id="Teknis" name="Teknis" rows="3" placeholder="Keterampilan Teknis" required><?php echo $data['Teknis']; ?></textarea>
              <label for="Lunak" class="form-label">Keterampilan Lunak</label>
              <textarea class="form-control" id="Lunak" name="Lunak" rows="3" placeholder="Keterampilan Lunak" required><?php echo $data['Lunak']; ?></textarea>
              <label for="Bahasa" class="form-label">Keterampilan Bahasa</label>
              <textarea class="form-control" id="Bahasa" name="Bahasa" rows="3" placeholder="Keterampilan Bahasa" required><?php echo $data['Bahasa']; ?></textarea>
              <label for="formFile" class="form-label">Foto Path</label>
              <input class="form-control" type="text" id="formFile" name="foto_path" value="<?php echo $data['foto_path']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>
  <!-- </div> -->
</body>

</html>