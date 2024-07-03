<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
date_default_timezone_set('Asia/Jakarta');

function tglwktskrng()
{
    return date('d F Y H:i:s');
}

$group = isset($_GET['group']) ? $_GET['group'] : 'B'; // Default group adalah B
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data UEFA 2024</title>
    <style>
        .custom-table {
            border: 2px solid black;
        }

        .custom-table th,
        .custom-table td {
            border: 2px solid black;
        }

        .custom-table th {
            background-color: #f0f0f0;
        }

        .print {
            width: 300px;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>

</head>

<body>
    <div class="container">
        <h2 class='text-center mt-4'>Data Group <?= htmlspecialchars($group) ?></h2>
        <p class='text-center'>Per <?= tglwktskrng() ?></p>
        <p class='text-center'><?= htmlspecialchars($_SESSION['nim']) ?></p>

        <form method="get" class="text-center mb-4 no-print">
            <label for="group" class="form-label">Pilih Group:</label>
            <select name="group" id="group" class="form-select w-25 d-inline">
                <option value="A" <?= $group == 'A' ? 'selected' : '' ?>>A</option>
                <option value="B" <?= $group == 'B' ? 'selected' : '' ?>>B</option>
                <option value="C" <?= $group == 'C' ? 'selected' : '' ?>>C</option>
                <option value="D" <?= $group == 'D' ? 'selected' : '' ?>>D</option>
            </select>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <?php
        $stmt = $conn->prepare("SELECT * FROM euro2024 WHERE groupeuro = ?");
        $stmt->bind_param("s", $group);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table class='table  text-center custom-table'>";
            echo "<thead>";
            echo "<tr>
                    <th>Tim</th>
                    <th>Menang</th>
                    <th>Seri</th>
                    <th>Kalah</th>
                    <th>Poin</th>
                  </tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['tim']}</td>
                        <td>{$row['menang']}</td>
                        <td>{$row['seri']}</td>
                        <td>{$row['kalah']}</td>
                        <td>{$row['poin']}</td>
                      </tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='text-center'>Tidak ada data untuk grup $group.</p>";
        }
        ?>

        <div class="text-center">
            <button onclick="window.print()" class="btn btn-primary mt-4 no-print print">Print</button>
        </div>

        <a href="index.php" class="btn btn-secondary mt-4 no-print home">Back to Home</a>
    </div>

    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>

</html>