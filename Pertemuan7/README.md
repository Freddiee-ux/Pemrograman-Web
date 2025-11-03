# Ajax JQuery

## Demo Submit Form
<img width="959" height="986" alt="image" src="https://github.com/user-attachments/assets/33b6c780-6b84-481f-aa35-a8fd99376f07" />

```php
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');

    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if ($name === '' || $email === '' || $message === '') {
        echo json_encode(['status' => 'error', 'message' => 'Semua field wajib diisi.']);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Format email tidak valid.']);
        exit;
    }

    $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    $log = date('Y-m-d H:i:s') . " | $safeName | $email | $safeMessage\n";
    if (file_put_contents('submissions.log', $log, FILE_APPEND) === false) {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data. Periksa permission.']);
        exit;
    }

    // Sukses: kembalikan JSON bersih
    echo json_encode(['status' => 'ok', 'message' => "Pesan berhasil terkirim! Terima kasih, $safeName."]);
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Form AJAX</title>
<style>
/* styling sederhana */
body{font-family:Arial;margin:24px}
.container{max-width:600px;margin:auto}
#response{margin-top:16px;padding:10px;border-radius:6px}
.success{background:#d4edda;color:#155724;border:1px solid #c3e6cb}
.error{background:#f8d7da;color:#721c24;border:1px solid #f5c6cb}
</style>
</head>
<body>
<div class="container">
  <h2>Demo Form Submit</h2>
  <div id="response"></div>
  <form id="contactForm">
    <label>Nama</label><br>
    <input type="text" name="name" required><br><br>
    <label>Email</label><br>
    <input type="email" name="email" required><br><br>
    <label>Pesan</label><br>
    <textarea name="message" rows="5" required></textarea><br><br>
    <button type="submit">Kirim</button>
  </form>
</div>

<!-- jQuery (CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function(){
  $('#contactForm').on('submit', function(e){
    e.preventDefault();
    $('#response').removeClass('success error').text('Mengirim...');

    $.ajax({
      url: 'index.php',
      type: 'POST',
      data: $(this).serialize(),
      dataType: 'json', // kita harapkan JSON
      success: function(resp){
        if (resp && resp.status === 'ok') {
          $('#response').removeClass('error').addClass('success').html(resp.message);
          $('#contactForm')[0].reset();
        } else {
          $('#response').removeClass('success').addClass('error').html(resp.message || 'Terjadi kesalahan.');
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
        // Jika server mengirimkan teks non-JSON (mis. warning), tampilkan untuk debugging
        var detail = jqXHR.responseText ? ('<pre style="white-space:pre-wrap;">' + jqXHR.responseText + '</pre>') : '';
        $('#response').removeClass('success').addClass('error').html('AJAX error: ' + textStatus + detail);
        console.error('AJAX error', textStatus, errorThrown, jqXHR);
      }
    });
  });
});
</script>
</body>
</html>
```
