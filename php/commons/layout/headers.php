<!--<script src="/progettoweb/js/supplier/headers.js"></script>
<script src="/progettoweb/js/supplier/notificationsHandling.js"></script> -->
<!-- file che recupera le notifiche dal server-->

<link href="http://localhost:8081/fishesdiagnosis/css/headerStyle.css" rel="stylesheet"/>

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" id="navbar1">

 <div class="navbar-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
      <span class="fa fa-bars"></span>
    </button>
  </div>

  <a class="navbar-brand ml-2" href="#">Fishes Diagnosis</a>

  <div class="collapse navbar-collapse" id="navbarContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Chi siamo</a>
      </li>
    </ul>
  </div>

<div>
  <button type="button" class="btn btn-light" data-toggle="dropdown">
    <span class="fas fa-user mediumIcon"></span> <!--oppure fa-lg oppure fa-2x-->
  </button>

  <div id="user" class="dropdown-menu dropdown-menu-right"> <!--Dropdwon for logout-->
    <a class="dropdown-item" href="/fishesdiagnosis/php/commons/scripts/logout.php">logout</a>
  </div>
</div>

</nav><!-- shared navbar-->
