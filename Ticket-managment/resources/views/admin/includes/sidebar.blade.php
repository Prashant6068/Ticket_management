<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmLWhnzhkfIuklPFxyk3VrMlORXz6FHE2WUg&usqp=CAU" alt="Logo" class="brand-image" style="filter: invert(85%)">
                <span class="brand-text font-weight-light">Ticket-management</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('dist/img/pic.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->first_name }}</a>
      </div>
    </div>
                        <li class="nav-item">
                            <a href="/home" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        
            
                        <li class="nav-item">
                            <a href="/users" class="nav-link">
                                <i class="nav-icon far fa-users"></i>
                                <p>
                                    User -Management
                                
                                </p>
                            </a>
                          
                        </li>
                        <li class="nav-item">
                            <a href="/tickets" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Tickets
                            
                                </p>
                            </a>
                           
                        </li>
                       
                        <li class="nav-item">
                            <a href="/ticketstatus" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                              

                                <p>
                                    Ticket status
                            
                                </p>
                            </a>
                           
                        </li>
                       
                        <li class="nav-item">
                            <a href="/report" class="nav-link">
                                <i class="nav-icon  fas fa-object-group"></i>
                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            
                        </li>
                       
                       
                       
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>