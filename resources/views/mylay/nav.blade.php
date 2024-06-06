<style>
  #searchform{
    margin-left: 250px;
  }
</style>

<nav class="navbar navbar-expand-lg bg-secondary">
  <div class="container-fluid">
   
    <a class="navbar-brand" href="#">E-Commarce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      <li class="nav-item">
          <a class="nav-link" href="#" id="datetime">Time </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
        <form class="d-flex" role="search" id="searchform">
          @csrf
        <li class="nav-item">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </li>
        &nbsp;&nbsp;&nbsp;
        <li class="nav-item">
        <button class="btn btn-dark" type="submit">Search</button>
        </li>

      </form>
      </ul>
      <ul class="mr-auto navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="{{url('login')}}"><span class="btn btn-success">Login</span></a>
        </li>
      <li class="nav-item">
          <a class="nav-link" href="{{url('register')}}"><span class="btn btn-info">Register</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><span class="btn btn-warning">Add To Card </span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script>
      // create a function to update the date and time
      function updateDateTime() {
        // create a new `Date` object
        const now = new Date();

        // get the current date and time as a string
        const currentDateTime = now.toLocaleTimeString();
       
        // update the `textContent` property of the `span` element with the `id` of `datetime`
        document.querySelector('#datetime').textContent = currentDateTime;
      }

      // call the `updateDateTime` function every second
      setInterval(updateDateTime, 1000);
</script>
    <script>
  var clockElement = document.getElementById("clock");

  function updateClock(clock) {
    clock.innerHTML = new Date().toLocaleTimeString();
  }

  // Call the updateClock function every second
  setInterval(function () {
    updateClock(clockElement);
  }, 1000);
</script>