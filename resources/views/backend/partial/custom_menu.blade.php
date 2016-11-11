<nav class="navbar">
  <ul class="nav nav-main" id="menu-container">
    @include('backend.partial.custom_menu_items', array('items' => $NavbarMenu->roots()))
  </ul>
</nav>