<style>
    .active{
        color: #ffec4e;
    }
</style>
<!-- Menu Navigation -->
<nav id="menu-navigation" class="stick-to-content" >
    <ul class="nav nav-menu bg-dark dark">
        <li><a href="<?=s_url."profile"?>" class="<?=($menu=="profile"?"active":"")?>">Profil</a></li>
        <li><a href="<?=s_url."categories"?>" class="<?=($menu=="categories"?"active":"")?>">Kategoriler</a></li>
        <li><a href="<?=s_url."list-menu"?>" class="<?=($menu=="menu-list"?"active":"")?>">Menü Listesi</a></li>
    </ul>
</nav>