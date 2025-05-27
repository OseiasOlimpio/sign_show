<?php include ('header.php'); ?>
<h1 class="text-center">Descubra seu Signo</h1>
<form method="POST" action="show_zodiac_sign.php" class="mt-4">
  <div class="mb-3">
    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
    <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Ver meu signo</button>
</form>
</div>
</body>
</html>