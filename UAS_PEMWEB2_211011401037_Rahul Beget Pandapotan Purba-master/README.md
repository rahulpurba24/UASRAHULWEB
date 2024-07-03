<h1>UAS PEMROGRAMAN WEB 2</h1>
<h2>211011401037_Rahul Beget Pandapotan Purba_UASpemweb1</h2>

<h3>Fungsi Yang digunakan</h3>

<p>Saya menggunakan fungsi mysqli_conncet untuk Menghubungkan Koneksi ke Database</p>
<p> Saya MeRequire/Memassukan code yang berapa pada config.php agar dapat terhubung ke database</p>
<P>Lalu saya menambahkan session_start() untuk memulai session dan saya mengambil session nim dan user id </P>
<p>$conn->prepare("SELECT * FROM users WHERE nim = ?");
Fungsi prepare digunakan untuk mempersiapkan query SQL yang akan dieksekusi. Query ini berisi placeholder (?) yang akan digantikan dengan nilai sebenarnya ketika query dieksekusi. Prepared statements membantu melindungi aplikasi dari serangan SQL injection karena query dan data dipisahkan.
</p>
<p>$query->bind_param("s", $nim);
Fungsi bind_param digunakan untuk mengikat (bind) parameter ke placeholder yang ada di query SQL yang telah dipersiapkan. Dalam contoh ini, "s" menunjukkan bahwa parameter yang diikat adalah string (s berarti string). Nilai $nim akan menggantikan placeholder (?) dalam query.
Format bind_param adalah:
"s": String
"i": Integer
"d": Double
"b": Blob (Binary Large Object)
</p>
<p>$query->execute();
Fungsi execute digunakan untuk mengeksekusi query SQL yang telah dipersiapkan dan diikat dengan parameter. Pada tahap ini, query yang telah diisi dengan nilai parameter akan dijalankan terhadap database.
</p>
<p>$result = $query->get_result();
Fungsi get_result digunakan untuk mendapatkan hasil dari query yang telah dieksekusi. Hasil ini kemudian dapat digunakan untuk memproses data lebih lanjut, misalnya dengan mengambil data dalam bentuk array atau objek.</p>
<P>Saya menggunakan fungsi date untuk mengatur tempat waktu dan mendapatkan waktu sekarang
  
  date_default_timezone_set('Asia/Jakarta');

function tglwktskrng()
{
    return date('d F Y H:i:s');
}</P>

<p>Lalu saya menambahkan Fungsi   Script untuk Mencetak Menjadi File .pdf
<script>
        function printPage() {
            window.print();
        }
    </script>
</p>

