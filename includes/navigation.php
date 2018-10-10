<?php
  $navClass=array("index"=>"", "resume"=>"", "online"=>"", "contact"=>"", "tutorials"=>"");
  if(!empty($activeNav)) {
    $navClass["$activeNav"] = "active";
  }
?>
<nav class="navbar navbar-expand-lg navbar-light navbar-mark container--body">
  <a class="navbar-brand" href="/">Mark Laramee</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo $navClass["index"] ?>">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown  <?php echo $navClass["resume"] ?>">
        <a class="nav-link" href="/assets/MarkLaramee_Resume_20180926.pdf" target="_blank">Resume</a>
      </li>
      <li class="nav-item dropdown  <?php echo $navClass["online"] ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Online
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/websites.php">Websites</a>
          <a class="dropdown-item" href="https://www.linkedin.com/in/marklaramee/" target="_blank">Linked In</a>
          <!-- div class="dropdown-divider"></div -->
          <a class="dropdown-item" href="https://stackoverflow.com/users/641854/mark" target="_blank">Stack Exchange</a>
        </div>
      </li>
      <li class="nav-item <?php echo $navClass["contact"] ?>">
        <a class="nav-link" href="/contact.php">Contact</a>
      </li>
      <li class="nav-item dropdown <?php echo $navClass["tutorials"] ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tutorials
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/animatedlabels.php">Fading Labels</a>
        </div>
      </li>
    </ul>
  </div>
</nav>