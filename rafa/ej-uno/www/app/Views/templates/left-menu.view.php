<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          



         



          <li class="nav-item">
            <a href="<?php echo $_ENV['host.folder'] ?>" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'inicio' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
              </p>
            </a>
          </li> 


           <!-- intento de menu 0 
            https://fontawesome.com/search?ic=free-collection
            -->

<!-- si el current url contiene /ej -> .menu-open -->
          <li class="nav-item <?php echo (str_contains($_SERVER['REQUEST_URI'], $_ENV['host.folder'] . 'ej')) ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ejercicios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              


              <?php for ($i = 1; $i <= 10; $i++): ?>
                  <li class="nav-item">
                      <a href="<?= $_ENV['host.folder'] . 'ej-' . $i ?>"
                        class="nav-link <?= $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'ej-' . $i ? 'active' : '' ?>">
                          <i class="fas fa-carrot nav-icon"></i>
                          <p>ej <?= $i ?></p>
                      </a>
                  </li>
              <?php endfor; ?>

             <!--  <li class="nav-item">
                <a href="<?php echo $_ENV['host.folder'] ?>ej-1" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'ej-1' ? 'active' : ''; ?>">
                  <i class="fas fa-carrot nav-icon"></i>
                  <p>ej 1</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="<?php echo $_ENV['host.folder'] ?>ej-2" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'ej-2' ? 'active' : ''; ?>">
                  <i class="fas fa-leaf nav-icon"></i>
                  <p>ej 2</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="<?php echo $_ENV['host.folder'] ?>ej-3" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'ej-3' ? 'active' : ''; ?>">
                  <i class="fas fa-lemon nav-icon"></i>
                  <p>ej 3</p>
                </a>
              </li>      -->         
            </ul>
          </li>


            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item <?php echo (in_array($_SERVER['REQUEST_URI'], [$_ENV['host.folder'] . 'demo-proveedores'])) ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de control
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $_ENV['host.folder'] ?>demo-proveedores" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'demo-proveedores' ? 'active' : ''; ?>">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Demo Proveedores</p>
                </a>
              </li>              
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->