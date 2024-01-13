 <!-- Total Article -->
 <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                         Total Article</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getTotalArticle(); ?></div>
                 </div>
                 <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Total Category -->
 <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                         Total Category</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getTotalCategory(); ?></div>
                 </div>
                 <div class="col-auto">
                     <i class="fas fa-tags fa-2x text-gray-300"></i>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Total Project -->
 <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Projects
                     </div>
                     <div class="row no-gutters align-items-center">
                         <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getTotalProject(); ?></div>
                     </div>
                 </div>
                 <div class="col-auto">
                     <i class="fas fa-receipt fa-2x text-gray-300"></i>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Total Client -->
 <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-warning shadow h-100 py-2">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                         Total Client</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getTotalClient(); ?></div>
                 </div>
                 <div class="col-auto">
                     <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Area Chart -->
 <div class="col-xl-12 col-lg-7">
     <div class="card shadow mb-4">
         <!-- Card Header - Dropdown -->
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
             <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
             <div class="dropdown no-arrow">
                 <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                     <div class="dropdown-header">Dropdown Header:</div>
                     <a class="dropdown-item" href="#">Action</a>
                     <a class="dropdown-item" href="#">Another action</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">Something else here</a>
                 </div>
             </div>
         </div>
         <!-- Card Body -->
         <div class="card-body">
             <div class="chart-area">
                 <canvas id="myAreaChart"></canvas>
             </div>
         </div>
     </div>
 </div>