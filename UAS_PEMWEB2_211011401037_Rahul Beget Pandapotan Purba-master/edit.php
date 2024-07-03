<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle edit process
    $kdeuro = $_POST['kdeuro'];
    $groupeuro = $_POST['groupeuro'];
    $tim = $_POST['tim'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $poin = $_POST['poin'];

    $stmt = $conn->prepare("UPDATE euro2024 SET groupeuro=?, tim=?, menang=?, seri=?, kalah=?, poin=? WHERE kdeuro=?");
    $stmt->bind_param("ssiiiii", $groupeuro, $tim, $menang, $seri, $kalah, $poin, $kdeuro);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve data based on kdeur
if (isset($_GET['kdeuro'])) {
    $kdeuro = $_GET['kdeuro'];
    $result = $conn->query("SELECT * FROM euro2024 WHERE kdeuro='$kdeuro'");
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "Kode UEFA tidak valid.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Data Tim</title>
</head>

<body>
    <div class="container mb-5">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <h1 class="text-center mb-4">Edit Data Tim</h1>
                <form method="post" action="">
                    <input type="hidden" name="kdeuro" value="<?php echo $row['kdeuro']; ?>">
                    <div class="mb-3">
                        <label for="groupeuro" class="form-label">Group</label>
                        <select class="form-select" id="groupeuro" name="groupeuro" required>
                            <option value="A" <?php if ($row['groupeuro'] == 'A') echo 'selected'; ?>>A</option>
                            <option value="B" <?php if ($row['groupeuro'] == 'B') echo 'selected'; ?>>B</option>
                            <option value="C" <?php if ($row['groupeuro'] == 'C') echo 'selected'; ?>>C</option>
                            <option value="D" <?php if ($row['groupeuro'] == 'D') echo 'selected'; ?>>D</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tim" class="form-label">Negara</label>
                        <select class="form-select" id="tim" name="tim" required>
                            <option value="">Pilih Negara</option>
                            <option value="Prancis" <?php if ($row['tim'] == 'Prancis') echo 'selected'; ?>>Prancis</option>
                            <option value="Jerman" <?php if ($row['tim'] == 'Jerman') echo 'selected'; ?>>Jerman</option>
                            <option value="Italia" <?php if ($row['tim'] == 'Italia') echo 'selected'; ?>>Italia</option>
                            <option value="Spanyol" <?php if ($row['tim'] == 'Spanyol') echo 'selected'; ?>>Spanyol</option>
                            <option value="Belgia" <?php if ($row['tim'] == 'Belgia') echo 'selected'; ?>>Belgia</option>
                            <option value="Portugal" <?php if ($row['tim'] == 'Portugal') echo 'selected'; ?>>Portugal</option>
                            <option value="Belanda" <?php if ($row['tim'] == 'Belanda') echo 'selected'; ?>>Belanda</option>
                            <option value="Kroasia" <?php if ($row['tim'] == 'Kroasia') echo 'selected'; ?>>Kroasia</option>
                            <option value="Denmark" <?php if ($row['tim'] == 'Denmark') echo 'selected'; ?>>Denmark</option>
                            <option value="Inggris" <?php if ($row['tim'] == 'Inggris') echo 'selected'; ?>>Inggris</option>
                            <option value="Albania" <?php if ($row['tim'] == 'Albania') echo 'selected'; ?>>Albania</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="menang" class="form-label">Menang</label>
                        <input type="number" class="form-control" id="menang" name="menang" value="<?php echo $row['menang']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="seri" class="form-label">Seri</label>
                        <input type="number" class="form-control" id="seri" name="seri" value="<?php echo $row['seri']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kalah" class="form-label">Kalah</label>
                        <input type="number" class="form-control" id="kalah" name="kalah" value="<?php echo $row['kalah']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="poin" class="form-label">Poin</label>
                        <input type="number" class="form-control" id="poin" name="poin" value="<?php echo $row['poin']; ?>" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>