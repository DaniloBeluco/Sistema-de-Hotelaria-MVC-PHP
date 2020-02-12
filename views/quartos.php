<?php include 'menu-lateral.php'; ?>
<div class="container">
    <div class="quartos-container tab">
        <!--<h4>Quartos</h4>-->
        <?php foreach ($quartos as $quarto): ?>
            <div class="quarto">
                <div class="qua-cima" style="padding: 5px;">
                    <div class="qua-esq"><img src="<?php echo BASE_URL; ?>assets/images/quartos/<?php echo $quarto['url_imagem']; ?>" width="100%" height="100%"/> </div>
                    <div class="qua-dir">
                        <div class="qua-dir-cima">
                            <div class="title"> <?php echo utf8_decode($quarto['nome']); ?></div>
                        </div>
                        <div class="qua-dir-meio">
                            <div class="icons">
                                <ul>
                                    <li><img src="<?php echo BASE_URL; ?>assets/images/icons/yes.png" width="16" height="16"/>Ar Condicionado</li>
                                    <li><img src="<?php echo BASE_URL; ?>assets/images/icons/yes.png" width="16" height="16"/>Telefone</li>
                                    <li><img src="<?php echo BASE_URL; ?>assets/images/icons/yes.png" width="16" height="16"/>Wifi</li>
                                    <li><img src="<?php echo BASE_URL; ?>assets/images/icons/yes.png" width="16" height="16"/>Frigobar</li>
                                </ul>
                            </div>
                            <div class="qua-dir-baixo">
                                <div class="qua-dir-baixo-esq">
                                    <button class="btn-detalhe-quarto">Detalhes</button>
                                    <div class="qua-cap"><img src="<?php echo BASE_URL; ?>assets/images/icons/peoples.png" width="16" height="16"/><p><?php echo $quarto['capacidade']; ?></p></div>
                                </div>
                                <div class="qua-dir-baixo-dir">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class='paginacao'>
            <?php
            for ($p = 1; $p <= $paginas; $p++):
                ?><a style="background:#3b7587;" class='paginacao-item' href="<?php echo BASE_URL ?>quartos?p=<?php echo $p; ?>"><?php echo $p; ?></a>

            <?php endfor; ?>
        </div>
    </div>
</div>


