<?php
session_start();

if(empty($_SESSION['login'])){
	header("Location: login.php");
}
?>
<?php
include 'config.php';

$result = mysqli_query($conn, "SELECT * FROM CVdata WHERE id=1"); 
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css">
  <script src="script.js"></script>
  <title>Curriculum Vitae</title>
</head>

<body class="p-3">
  <div class="judul">
    <h1>CV</h1>
  </div>

  <nav class="navbar sticky-top bg-body-tertiary biru">
    <div class="container-fluid">
      <a href="#nama">Profile</a>
      <a href="#pendidikan">Pendidikan</a>
      <a href="#keterampilan">Keterampilan</a>
      <a href="#komentar">Komentar</a>
      <a class="navbar-brand" href="admin.php">Update</a>
      <a href="logout.php" >Logout</a>
    </div>
  </nav>

  <div class="card">
    <div class="p-3">

      <div class="container">
      <img src="<?php echo $data['foto_path']; ?>" alt="Foto Profil">
        <div class="text-container">
          <h2 class="card-title" id ="nama"><?php echo $data['nama']; ?></h2>
          <h4>UI/UX Designer</h4>
        </div>
      </div>
      
      <div class="card2">
        <hr>
        <h2>Data Diri</h2>
        <p class="card-text"><?php echo $data['alamat']; ?></p>
        <p class="card-text"><?php echo $data['telepon']; ?></p>
        <p class="card-text"><?php echo $data['email']; ?></p>
        <p class="card-text"><?php echo $data['web']; ?></p>
        <hr>
        <h2>Pendidikan</h2>
        <p class="card-text" id ="pendidikan"><?php echo $data['pendidikan']; ?></p>
        <p class="card-text" id ="SD"><?php echo $data['SD']; ?></p>
        <p class="card-text" id ="SMP"><?php echo $data['SMP']; ?></p>
        <p class="card-text" id ="SMA"><?php echo $data['SMA']; ?></p>
        <p class="card-text" id ="Kuliah"><?php echo $data['Kuliah']; ?></p>
        <hr>
        <h2>Pengalaman Kerja</h2>
        <p class="card-text" id ="pengalaman_kerja"><?php echo $data['pengalaman_kerja']; ?></p>
        <p class="card-text"><?php echo $data['Software_System_Design']; ?></p>
        <p class="card-text"><?php echo $data['Staff_Design_Team']; ?></p>
        <hr>
        <h2>Keterampilan</h2>
        <p class="card-text" id ="Teknis"><?php echo $data['Teknis']; ?></p>
        <p class="card-text" id ="Lunak"><?php echo $data['Lunak']; ?></p>
        <p class="card-text" id ="Bahasa"><?php echo $data['Bahasa']; ?></p>
      </div>
    </div>
  </div>
  <!-- Tampilkan komentar -->
  <hr>
  <nav class="navbar sticky-top bg-body-tertiary biru">
    <div class="container-fluid" id="komentar">
      <h1>Komentar</h1>
    </div>
  </nav>
  <div class="card">
    <div class="p-3">
      <div id="comments">
        <?php
        include 'config.php';

        $cvId = 1; 
        $query = "SELECT * FROM comments WHERE CVid = $cvId";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
          while ($comment = mysqli_fetch_assoc($result)) {
            echo '<div class="comment">' . $comment['comment_text'] . '</div>';
          }
        } else {
          echo 'Belum ada komentar.';
        }

        mysqli_close($conn);
        ?>
      </div class="card2">
      <label for="commentInput" class="form-label">Tambahkan Komentar</label>
      <textarea class="form-control" id="commentInput" name="comment" rows="3" placeholder="Tambahkan komentar..."></textarea>
      <button class="btn btn-primary" onclick="addComment()">Tambah Komentar</button>
    </div>
  </div>

</body>

</html>