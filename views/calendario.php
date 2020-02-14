<?php include 'menu-lateral-design.php'; ?>
<?php // include 'right-menu.php';          ?>
<div class="container">

    <div class="calendario">
        <!--<h4>Calendário</h4>-->
        <div class="select-menu">
            <form method="GET">
                <select name="ano">
                    <?php
                    for ($q = date('Y'); $q >= 2014; $q--):
                        ?>
                        <option <?php
                        if ($_GET['ano'] == $q): echo "selected";
                        endif;
                        ?>><?php echo $q; ?></option>
                        <?php endfor; ?>
                </select>
                <select name="mes">
                    <option <?php
                    if ($_GET['mes'] == 1): echo "selected";
                    endif;
                    ?> value="1">Janeiro</option>
                    <option <?php
                    if ($_GET['mes'] == 2): echo "selected";
                    endif;
                    ?> value="2">Fevereiro</option>
                    <option <?php
                    if ($_GET['mes'] == 3): echo "selected";
                    endif;
                    ?> value="3">Março</option>
                    <option <?php
                    if ($_GET['mes'] == 4): echo "selected";
                    endif;
                    ?> value="4">Abril</option>
                    <option <?php
                    if ($_GET['mes'] == 5): echo "selected";
                    endif;
                    ?> value="5">Maio</option>
                    <option <?php
                    if ($_GET['mes'] == 6): echo "selected";
                    endif;
                    ?> value="6">Junho</option>
                    <option <?php
                    if ($_GET['mes'] == 7): echo "selected";
                    endif;
                    ?> value="7">Julho</option>
                    <option <?php
                    if ($_GET['mes'] == 8): echo "selected";
                    endif;
                    ?> value="8">Agosto</option>
                    <option <?php
                    if ($_GET['mes'] == 9): echo "selected";
                    endif;
                    ?> value="9">Setembro</option>
                    <option <?php
                    if ($_GET['mes'] == 10): echo "selected";
                    endif;
                    ?> value="10">Outubro</option>
                    <option <?php
                    if ($_GET['mes'] == 11): echo "selected";
                    endif;
                    ?> value="11" >Novembro</option>
                    <option <?php
                    if ($_GET['mes'] == 12): echo "selected";
                    endif;
                    ?> value="12">Dezembro</option>
                </select>
                <input type="submit" value="Mostrar" class="btn-select"/>
            </form>
        </div>
        <table class="table table-bordered" style="width: 100%;">
            <tr>
                <th>Dom</th>
                <th>Seg</th>
                <th>Ter</th>
                <th>Qua</th>
                <th>Qui</th>
                <th>Sex</th>
                <th>Sab</th>
            </tr>

            <?php
            for ($l = 0; $l < $linhas; $l++):
                ?>
                <tr>
                    <?php
                    for ($q = 0; $q < 7; $q++):
                        $w = strtotime(($q + ($l * 7)) . 'days', strtotime($data_inicio));
                        $d = explode('/', date('d/m/Y', $w));
                        ?>
                        <td class='td-view'><?php echo $d[0]; ?><span class="d2"><?php echo '/' . $d[1]; ?></span><span class="d3"><?php echo '/' . $d[2]; ?></span></td>
                    <?php endfor;
                    ?>
                </tr>
            <?php endfor; ?>
        </table>
        <div style="" class="calendario-reservas">
            <h4 style="color:#4fcd62;">Clique em uma data no calendário*</h4>
        </div>
    </div>




</div>

