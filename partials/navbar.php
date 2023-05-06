<aside class="mt-10">
            <nav>
                <a href="<?=$base_url;?>">
                    <div class="menu-item <?php $activeMenu == 'home' ? 'active' : '' ?>">
                        <div class="menu-item-icon">
                            <img src="<?=$base_url;?>/assets/images/home-run.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Home
                        </div>
                    </div>
                </a>
                <a href="<?=$base_url;?>/perfil.php">
                    <div class="menu-item" <?php $activeMenu == 'profile' ? 'active' : '' ?>>
                        <div class="menu-item-icon">
                            <img src="<?=$base_url;?>/assets/images/user.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Meu Perfil
                        </div>
                    </div>
                </a>
                <a href="<?=$base_url;?>/amigos.php">
                    <div class="menu-item" <?php $activeMenu == 'friends' ? 'active' : '' ?>>
                        <div class="menu-item-icon">
                            <img src="<?=$base_url;?>/assets/images/friends.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Amigos
                        </div>
                    </div>
                </a>
                <a href="<?=$base_url;?>/fotos.php">
                    <div class="menu-item" <?php $activeMenu == 'photos' ? 'active' : '' ?>>
                        <div class="menu-item-icon">
                            <img src="<?=$base_url;?>/assets/images/photo.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Fotos
                        </div>
                    </div>
                </a>
                <div class="menu-splitter"></div>
                <a href="<?=$base_url;?>/configuracoes.php">
                    <div class="menu-item" <?php $activeMenu == 'settings' ? 'active' : '' ?>>
                        <div class="menu-item-icon">
                            <img src="<?=$base_url;?>/assets/images/settings.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Configurações
                        </div>
                    </div>
                </a>
                <a href="<?=$base_url;?>/logout.php">
                    <div class="menu-item">
                        <div class="menu-item-icon">
                            <img src="<?=$base_url;?>/assets/images/power.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Sair
                        </div>
                    </div>
                </a>
            </nav>
</aside>