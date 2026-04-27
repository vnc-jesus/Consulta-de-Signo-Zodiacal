<?php include('layouts/header.php'); ?>

<div class="container">
    <div class="card formulario-card">
        <h1>Descubra seu signo</h1>

        <form method="POST" action="show_zodiac_sign.php">
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de nascimento</label>
                <input 
                    type="date" 
                    class="form-control" 
                    id="data_nascimento" 
                    name="data_nascimento" 
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Descobrir
            </button>
        </form>
    </div>
</div>

</body>
</html>