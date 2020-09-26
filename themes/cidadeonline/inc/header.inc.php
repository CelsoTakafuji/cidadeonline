<header class="main-header">
    <div class="container">
        <hgroup>
            <h1>Cidade Online - Eventos, Promoções e Novidades!</h1>
            <h2>Confira os eventos, promoções e novidades em sua cidade. Aqui, no Cidade Online!</h2>
        </hgroup>

        <div class="header-banner">
            <!--468x60-->
            <a href="http://www.upinside.com.br/campus" title="Campus UpInside - Cursos Profissionais em TI">
                <img src="<?= INCLUDE_PATH; ?>/_tmp/banner_medium.png" title="Campus UpInside - Cursos Profissionais em TI" alt="Campus UpInside - Cursos Profissionais em TI" />
            </a>
        </div><!-- banner -->

        <nav class="main-nav">

            <ul class="top">
                <li><a href="<?= HOME ?>" title="">Home</a></li>
				
				<?php
				$cat = new Read;
				$cat->ExeRead("ws_categories", "WHERE category_parent IS NULL ORDER BY category_name DESC LIMIT :limit OFFSET :offset", "limit=5&offset=0");
				if ($cat->getResult()):
					foreach ($cat->getResult() as $c):
						echo '<li><a href="'. HOME .'/categoria/'.$c['category_name'].'" title="'.$c['category_name'].'">'.$c['category_name'].'</a>';
						$subCat = new Read;
						$subCat->ExeRead("ws_categories", "WHERE category_parent = :category_parent ORDER BY category_name DESC", "category_parent={$c['category_id']}");
						if ($subCat->getResult()):
							echo '<ul class="sub">';
							foreach ($subCat->getResult() as $sc):
								echo '<li><a href="'. HOME .'/categoria/'.$sc['category_name'].'" title="'.$sc['category_name'].'">'.$sc['category_name'].'</a></li>';
							endforeach;
							echo '</ul> ';
						endif;
						echo '</li>';
					endforeach;
				endif;
				?>
				
				<li><a href="<?= HOME ?>/empresas" title="">Empresas</a>
				<ul class="sub">
					<li><a href="<?= HOME ?>/empresas/onde-comer" title="">Onde Comer</a></li>
					<li><a href="<?= HOME ?>/empresas/onde-ficar" title="">Onde Ficar</a></li>
					<li><a href="<?= HOME ?>/empresas/onde-comprar" title="">Onde Comprar</a></li>
					<li><a href="<?= HOME ?>/empresas/onde-se-divertir" title="">Onde Se Divertir</a></li>
				</ul>
				</li>
				
                <li class="search">
                    <?php
                    $search = filter_input(INPUT_POST, 's', FILTER_DEFAULT);
                    if (!empty($search)):
                        $search = strip_tags(trim(urlencode($search)));
                        header('Location: ' . HOME . '/pesquisa/' . $search);
                    endif;
                    ?>

                    <form name="search" action="" method="post">
                        <input class="fls" type="text" name="s" />
                        <input class="btn" type="submit" name="sendsearch" value="" />
                    </form>
                </li>

            </ul>
        </nav> <!-- main nav -->

    </div><!-- Container Header -->
</header> <!-- main header -->