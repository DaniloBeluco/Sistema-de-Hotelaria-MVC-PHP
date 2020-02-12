
<div class="reservados-hoje">
    <div class="title">Reservados</div>

    <?php
    foreach ($quartos as $quarto) {
        echo "<div class='reservados-hoje-item'>" . utf8_decode($quarto['nome']) . "<br/>";
        $in = strtotime($quarto['data_inicio']);
        $dt_in = date('d/m', $in);
        $out = strtotime($quarto['data_fim']);
        $dt_out = date('d/m', $out);
        echo"<div class='res-data'>de: " . $dt_in . '   até: ' . $dt_out . "</div></div>";
    }
    ?>
</div>
<div class="livres-hoje">
    <div class="title">Livres</div>
    <?php
    foreach ($quartos_disp as $quarto) {
        echo "<div class='reservados-hoje-item'>" . utf8_decode($quarto['nome']) . "<br/>";
        
        echo"<div class='res-data'>Disponível</div></div>";
    }
    ?>
</div>

