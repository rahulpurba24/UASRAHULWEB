<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $groupeuro = $_POST['groupeuro'];
    $tim = $_POST['tim'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $poin = $_POST['poin'];

    $stmt = $conn->prepare("INSERT INTO euro2024 (groupeuro, tim, menang, seri, kalah, poin) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiii", $groupeuro, $tim, $menang, $seri, $kalah, $poin);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>UAS PEMWEB 2</title>
    <style>
        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mb-5">
        <h1 class="text-center mb-5">Klasemen UEFA 2024</h1>
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-center mt-4">Data Tabel EURO 2024</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Group</th>
                            <th>Negara</th>
                            <th>Menang</th>
                            <th>Seri</th>
                            <th>Kalah</th>
                            <th>Poin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $euro2024 = $conn->query("SELECT * FROM euro2024");
                        while ($row = $euro2024->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['groupeuro']; ?></td>
                                <td><?php echo $row['tim']; ?></td>
                                <td><?php echo $row['menang']; ?></td>
                                <td><?php echo $row['seri']; ?></td>
                                <td><?php echo $row['kalah']; ?></td>
                                <td><?php echo $row['poin']; ?></td>
                                <td>
                                    <a href="edit.php?kdeuro=<?php echo $row['kdeuro']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete.php?kdeuro=<?php echo $row['kdeuro']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <a href="datagroup.php" class="btn btn-success mt-4">Cetak Data Group</a>
                <a href="logout.php" class="btn btn-danger mt-4">Logout</a>
            </div>
            <div class="col-md-4">
                <h2 class="text-center mt-4">Input Data Tim</h2>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="groupeuro" class="form-label">Group</label>
                        <select class="form-select" id="groupeuro" name="groupeuro" required>
                            <option value="">Pilih Group</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tim" class="form-label">Negara</label>
                        <select class="form-select" id="tim" name="tim" required>
                            <option value="">Pilih Negara</option>
                            <option value="Prancis">Prancis</option>
                            <option value="Jerman">Jerman</option>
                            <option value="Italia">Italia</option>
                            <option value="Spanyol">Spanyol</option>
                            <option value="Belgia">Belgia</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Belanda">Belanda</option>
                            <option value="Kroasia">Kroasia</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Inggris">Inggris</option>
                            <option value="Albania">Albania</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="menang" class="form-label">Menang</label>
                        <input type="number" class="form-control" id="menang" name="menang" required>
                    </div>
                    <div class="mb-3">
                        <label for="seri" class="form-label">Seri</label>
                        <input type="number" class="form-control" id="seri" name="seri" required>
                    </div>
                    <div class="mb-3">
                        <label for="kalah" class="form-label">Kalah</label>
                        <input type="number" class="form-control" id="kalah" name="kalah" required>
                    </div>
                    <div class="mb-3">
                        <label for="poin" class="form-label">Poin</label>
                        <input type="number" class="form-control" id="poin" name="poin" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>