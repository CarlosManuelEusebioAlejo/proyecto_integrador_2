<?php $numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion); ?>
<div class="d-flex justify-content-center">
    <nav aria-label="...">
        <ul class="pagination pagination-lg">
            <?php if(pagina_actual() === 1): ?>
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?p=<?php echo pagina_actual() -1 ?>">&laquo;</a>
                </li>
            <?php endif; ?>

            <?php for($i = 1; $i<=$numero_paginas; $i++): ?>
                <?php if (pagina_actual() === $i): ?>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link"><?php echo $i;?></span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if(pagina_actual() == $numero_paginas):?>
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?p=<?php echo pagina_actual() +1; ?>">&raquo;</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
